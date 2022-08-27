<?php

namespace App\Http\Livewire\Dashboard\Roles;

use App\Actions\Role\CreateNewRole;
use App\Actions\Role\RoleValidationRule;
use App\Http\Livewire\Traits\WithToast;
use App\Models\Permission;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Create extends Component
{
    use WithToast, RoleValidationRule, AuthorizesRequests;

    public string $prefix = 'roleArr.';
    public array $roleArr;

    public function mount()
    {
        $this->authorize('create-roles');

        $this->roleArr = [];
    }

    public function render()
    {
        return view('livewire.dashboard.roles.create', [
            'permissions' => Permission::all()
        ]);
    }

    public function create()
    {
        if (isset($this->roleArr['permissions']))
            $this->roleArr['permissions_keys'] = array_keys($this->roleArr['permissions'], true);

        $this->validate($this->roleRulesForCreate($this->prefix));

        (new CreateNewRole())->create($this->roleArr);

        $this->toast(trans('toast.Successful role creation'));
        return redirect(route('dashboard.roles'));
    }
}
