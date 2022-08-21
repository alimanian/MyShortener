<?php

namespace App\Actions\User;

use Illuminate\Support\Facades\Auth;

class UserLogin
{
    public function __construct(
        private array $params
    ){}

    public function login(): bool
    {
        return $this->attemptLogin($this->params);
    }

    private function attemptLogin(array $params): bool
    {
        return Auth::attempt([
            'phone_number' => $params['phone_number'],
            'password'     => $params['password']
        ], true);
    }
}
