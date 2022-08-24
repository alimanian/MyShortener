<?php

namespace App\Http\Livewire\Dashboard\Categories;

use App\Actions\Category\CategoryValidationRule;
use App\Actions\Category\UpdateCategory;
use App\Http\Livewire\Traits\WithToast;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Edit extends Component
{
    use CategoryValidationRule, WithToast, AuthorizesRequests;

    public string $prefix = 'categoryArr.';
    public array $categoryArr;

    public function mount(Category $category)
    {
        $this->authorize('update-categories');

        $this->categoryArr = $category->toArray();
    }

    public function render()
    {
        return view('livewire.dashboard.category.edit');
    }

    public function update()
    {
        $this->validate($this->categoryRulesForUpdate($this->categoryArr['id'], $this->prefix));

        (new UpdateCategory())->update($this->categoryArr['id'], $this->categoryArr);

        $this->toast(trans('toast.Successful category updated'));

        return redirect(route('dashboard.categories'));
    }
}
