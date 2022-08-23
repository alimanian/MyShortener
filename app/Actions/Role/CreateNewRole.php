<?php

namespace App\Actions\Role;

use App\Models\Role as RoleModel;

class CreateNewRole
{
    use RoleValidationRule;

    public function rules(string $prefix = null): array
    {
        return $this->roleRulesForCreate($prefix);
    }

    public function create(array $params)
    {
        $role = RoleModel::create([
            'name' => $params['name'] ?? null,
            'label' => $params['label'] ?? null,
        ]);

        $role->permissions()->sync($params['permissions_keys']);
        return $role;
    }
}
