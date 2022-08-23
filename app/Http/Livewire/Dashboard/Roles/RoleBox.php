<?php

namespace App\Http\Livewire\Dashboard\Roles;

use App\Actions\Role\DeleteRole;
use App\Models\Role as RoleModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class RoleBox extends Component
{
    use AuthorizesRequests;

    public RoleModel $role;
    public int $index;

    public function delete()
    {
        $this->authorize('delete-roles');

        DeleteRole::delete($this->role->id);
        $this->emitUp('roleDeleted');
    }

    public function render()
    {
        return view('livewire.dashboard.roles.role-box');
    }
}
