<?php

namespace App\Actions\Role;

trait RoleValidationRule
{
    private function roleRulesForCreate(string $prefix = null): array
    {
        $rules = [
            'name' => 'required|string|max:255|unique:roles,name',
            'label' => 'required|string|max:255',
            'permissions_keys' => 'required|array',
            'permissions_keys.*' => 'nullable|exists:permissions,id',
        ];

        return (!is_null($prefix)) ? array_prefix($prefix, $rules) : $rules;
    }

    private function roleRulesForUpdate(int $roleId, string $prefix = null): array
    {
        $rules = [
            'name' => 'required|string|max:255|unique:roles,name,'.$roleId,
            'label' => 'required|string|max:255',
            'permissions_keys' => 'required|array',
            'permissions_keys.*' => 'nullable|exists:permissions,id',
        ];

        return (!is_null($prefix)) ? array_prefix($prefix, $rules) : $rules;
    }
}
