<?php

namespace App\Actions\User;

use App\Models\User as UserModel;

class UpdateUser
{
    use UserValidationRule;

    public function rules(int $userId, string $prefix = null): array
    {
        return $this->userRulesForUpdate($prefix);
    }

    public function update(int $userId, array $params)
    {
        $user = UserModel::find($userId);
        $user->update([
            'first_name' => $params['first_name'] ?? null,
            'last_name' => $params['last_name'] ?? null,
            'phone_number' => $params['phone_number'],
            'email' => $params['email'] ?? null,
            'is_active' => $params['is_active'] ?? true
        ]);

        if (isset($params['role_id']))
            $user->roles()->sync($params['role_id']);
        return $user;
    }
}
