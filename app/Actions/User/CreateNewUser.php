<?php

namespace App\Actions\User;

use App\Models\User as UserModel;

class CreateNewUser
{
    use UserValidationRule;

    public function rules(string $prefix = null): array
    {
        return $this->userRulesForRegister($prefix);
    }

    public function create(array $params): UserModel
    {
        return UserModel::create([
            'first_name' => $params['first_name'] ?? null,
            'last_name' => $params['last_name'] ?? null,
            'phone_number' => $params['phone_number'],
            'email' => $params['email'] ?? null,
            'password' => $params['password'],
            'is_active' => $params['is_active'] ?? true
        ]);
    }
}
