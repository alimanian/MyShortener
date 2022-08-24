<?php

namespace App\Http\Livewire\Dashboard\Categories;

use App\Actions\Category\CategoryValidationRule;
use App\Actions\Category\CreateNewCategory;
use App\Actions\Role\CreateNewRole;
use App\Http\Livewire\Traits\WithToast;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Create extends Component
{
    use WithToast, CategoryValidationRule, AuthorizesRequests;

    public string $prefix = 'categoryArr.';
    public array $categoryArr;

    public function mount()
    {
        $this->authorize('create-categories');

        $this->categoryArr = [];
    }

    public function render()
    {
        return view('livewire.dashboard.category.create');
    }

    public function create()
    {
        $this->validate($this->categoryRulesForCreate($this->prefix));

        (new CreateNewCategory())->create($this->categoryArr);

        $this->toast(trans('toast.Successful category creation'));

        return redirect(route('dashboard.categories'));
    }
}
