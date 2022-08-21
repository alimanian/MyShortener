<?php

namespace App\Actions\VerifyCode;

trait VerifyCodeValidationRule
{
    private function verifyCodeRules(string $prefix = null): array
    {
        $rules = [
            'verify_code' => 'required|digits:6',
        ];

        return (!is_null($prefix)) ? array_prefix($prefix, $rules) : $rules;
    }
}
