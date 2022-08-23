<?php

namespace App\Actions\Role;

use App\Models\Role as RoleModel;

class DeleteRole
{
    public static function delete(int $roleId): bool
    {
        return RoleModel::find($roleId)->delete();
    }
}
