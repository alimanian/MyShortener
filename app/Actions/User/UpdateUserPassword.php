<?php

namespace App\Actions\User;

use App\Models\User as UserModel;

class UpdateUserPassword
{
    use UserValidationRule;

    public function rules(string $prefix = null): array
    {
        return $this->userRulesForForget($prefix);
    }

    public function update(array $params): UserModel
    {
        $user = UserModel::where('phone_number', $params['phone_number'])->first();
        # TODO Check if not Update Error
        $user->update([
            'password' => $params['password']
        ]);
        return $user;
    }
}
