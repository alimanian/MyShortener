<?php

namespace App\Http\Livewire\Dashboard\Categories;

use App\Actions\Category\DeleteCategory;
use App\Models\Category as CategoryModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class CategoryBox extends Component
{
    use AuthorizesRequests;

    public CategoryModel $category;
    public int $index;

    public function delete()
    {
        $this->authorize('delete-categories');

        DeleteCategory::delete($this->category->id);

        $this->emitUp('categoryDeleted');
    }

    public function render()
    {
        return view('livewire.dashboard.category.category-box');
    }
}
