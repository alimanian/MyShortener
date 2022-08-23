<?php

namespace App\Http\Livewire\Dashboard\Roles;

use App\Http\Livewire\Traits\WithToast;
use App\Models\Role as RoleModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithToast, AuthorizesRequests;

    public $search;

    protected $listeners = ['roleDeleted' => 'roleDelete'];

    public function mount()
    {
        $this->authorize('show-roles');
    }

    public function render()
    {
        return view('livewire.dashboard.roles.index', [
            'roles' => RoleModel::where('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('label', 'LIKE', '%' . $this->search . '%')
                ->paginate(10),
        ]);
    }

    public function roleDelete()
    {
        $this->toast(trans('toast.Successful role removal'), true);
    }
}
