<?php

namespace App\Http\Livewire\Dashboard\Categories;

use App\Http\Livewire\Traits\WithToast;
use App\Models\Category as CategoryModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithToast, AuthorizesRequests;

    public $search;

    protected $listeners = ['categoryDeleted' => 'categoryDelete'];

    public function mount()
    {
        $this->authorize('show-categories');
    }

    public function render()
    {
        return view('livewire.dashboard.category.index', [
            'categories' => CategoryModel::where('title', 'LIKE', '%' . $this->search . '%')
                ->orWhere('slug', 'LIKE', '%' . $this->search . '%')
                ->orWhere('description', 'LIKE', '%' . $this->search . '%')
                ->paginate(10),
        ]);
    }

    public function categoryDelete()
    {
        $this->toast(trans('toast.Successful category removal'), true);
    }
}
