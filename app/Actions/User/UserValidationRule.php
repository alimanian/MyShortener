<?php

namespace App\Actions\User;

trait UserValidationRule
{
    private function userRulesForRegister(string $prefix = null): array
    {
        $rules = [
            'first_name' => 'required|string|max:40|regex:'.config('regex.persian_characters'),
            'last_name' => 'required|string|max:60|regex:'.config('regex.persian_characters'),
            'phone_number' => 'required|digits:11|unique:users,phone_number|regex:'.config('regex.persian_mobile'),
            'password' => 'required|min:8|string|regex:'.config('regex.password'),
        ];

        return (!is_null($prefix)) ? array_prefix($prefix, $rules) : $rules;
    }

    private function userRulesForLogin(string $prefix = null): array
    {
        $rules = [
            'phone_number' => 'required|digits:11|exists:users,phone_number|regex:'.config('regex.persian_mobile'),
            'password' => 'required|min:8|string|regex:'.config('regex.password'),
        ];

        return (!is_null($prefix)) ? array_prefix($prefix, $rules) : $rules;
    }

    private function userRulesForForget(string $prefix = null): array
    {
        $rules = [
            'phone_number' => 'required|digits:11|exists:users,phone_number|regex:'.config('regex.persian_mobile'),
            'password' => 'required|min:8|string|regex:'.config('regex.password'),
        ];

        return (!is_null($prefix)) ? array_prefix($prefix, $rules) : $rules;
    }
}
