<?php

namespace App\Actions\Role;

use App\Models\Role as RoleModel;

class UpdateRole
{
    use RoleValidationRule;

    public function rules(int $userId, string $prefix = null): array
    {
        return $this->roleRulesForUpdate($prefix);
    }

    public function update(int $roleId, array $params): RoleModel
    {
        $role = RoleModel::find($roleId);
        $role->update([
            'name' => $params['name'] ?? null,
            'label' => $params['label'] ?? null,
        ]);

        $role->permissions()->sync($params['permissions_keys']);
        return $role;
    }
}
