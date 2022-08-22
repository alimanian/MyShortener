<?php

namespace App\Actions\User;

use App\Models\User as UserModel;

class DeleteUser
{
    public static function delete(int $userId): bool
    {
        return UserModel::find($userId)->delete();
    }
}
