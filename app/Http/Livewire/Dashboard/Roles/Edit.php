<?php

namespace App\Http\Livewire\Dashboard\Roles;

use App\Actions\Role\RoleValidationRule;
use App\Actions\Role\UpdateRole;
use App\Http\Livewire\Traits\WithToast;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Edit extends Component
{
    use RoleValidationRule, WithToast, AuthorizesRequests;

    public string $prefix = 'roleArr.';
    public array $roleArr;

    public function mount(Role $role)
    {
        $this->authorize('update-roles');

        $this->roleArr = $role->toArray();

        foreach ($role->permissions as $permission)
            $this->roleArr['permissions'][$permission->id] = true;

    }

    public function render()
    {
        return view('livewire.dashboard.roles.edit', [
            'permissions' => Permission::all()
        ]);
    }

    public function update()
    {
        if (isset($this->roleArr['permissions']))
            $this->roleArr['permissions_keys'] =  array_keys($this->roleArr['permissions'], true);

        $this->validate($this->roleRulesForUpdate($this->roleArr['id'], $this->prefix));

        (new UpdateRole())->update($this->roleArr['id'], $this->roleArr);

        $this->toast(trans('toast.Successful role updated'));
        return redirect(route('dashboard.roles'));
    }
}
