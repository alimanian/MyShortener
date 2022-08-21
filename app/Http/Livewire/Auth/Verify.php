<?php

namespace App\Http\Livewire\Auth;

use App\Actions\VerifyCode\VerifyCode;
use App\Actions\VerifyCode\VerifyCodeValidationRule;
use App\Http\Livewire\Traits\Exceptions\TooManyRequestsException;
use App\Http\Livewire\Traits\WithRateLimiting;
use Illuminate\Validation\ValidationException;

trait Verify
{
    use VerifyCodeValidationRule, WithRateLimiting;

    abstract protected function prefix(): string;
    abstract protected function phoneNumber(): string;
    abstract protected function verifyCode(): string;
    abstract protected function actionAfterCodeIsValid();
    abstract protected function rateLimitRedirectURL(): string;

    /**
     * @throws ValidationException
     */
    public function verify()
    {
        $this->validate($this->verifyCodeRules($this->prefix()));

        $verifyCode = new VerifyCode($this->phoneNumber());

        if (! $verifyCode->isValidCode($this->verifyCode())){
            # TODO If the code has expired, the error message is the same. This will be corrected in the future.
            try {
                $this->rateLimit(
                    $maxAttempts = config('rateLimit.VerifyCode'),
                    $decaySeconds = config('expire.VerifyCode'),
                );
            } catch (TooManyRequestsException $exception) {
                return redirect($this->rateLimitRedirectURL());
            }
            throw ValidationException::withMessages([$this->prefix().'verify_code'
            => trans('validation.The verification code is incorrect. You have :count more times to enter the correct code.',
                    ['count' => $this->remaining(config('rateLimit.VerifyCode'))])]);
        }

        $this->actionAfterCodeIsValid();
    }
}
