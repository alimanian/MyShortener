<?php

namespace App\Actions\VerifyCode;

use App\Models\VerifyCode as VerifyCodeModel;
use App\Notifications\VerifyCode as VerifyCodeNotification;
use Illuminate\Support\Facades\Notification;

class VerifyCode
{
    use VerifyCodeValidationRule;

    public function __construct(
        private string $phoneNumber
    ){}

    public function rules(string $prefix = null): array
    {
        return $this->verifyCodeRules($prefix);
    }

    public function create(): VerifyCodeModel
    {
        return VerifyCodeModel::generateCode($this->phoneNumber);
    }

    public function sendCode(VerifyCodeModel $activeCodeRow, string $pattern = null)
    {
        Notification::sendNow($activeCodeRow,
            new VerifyCodeNotification(
                config('kavenegar.VerificationCode'),
                $pattern ?? trans('kavenegar.VerificationCode-Register')
            ));
    }

    public function isActiveCode()
    {
        return VerifyCodeModel::isActiveCode($this->phoneNumber);
    }

    public function getActiveCode(): VerifyCodeModel|bool
    {
        if ($this->isActiveCode($this->phoneNumber))
            return VerifyCodeModel::getActiveCode($this->phoneNumber);
        return false;
    }

    public function isValidCode(string $verifyCode)
    {
        return VerifyCodeModel::isValidCode($verifyCode, $this->phoneNumber);
    }

    public function deleteCode()
    {
        return VerifyCodeModel::deleteCode($this->phoneNumber);
    }
}
