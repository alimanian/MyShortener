<?php

namespace App\Http\Livewire\Auth;

use App\Actions\User\UserLogin;
use App\Actions\User\UserValidationRule;
use App\Http\Livewire\Traits\Exceptions\TooManyRequestsException;
use App\Http\Livewire\Traits\WithRateLimiting;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component
{
    use UserValidationRule, WithRateLimiting;

    public string $prefix = 'userArr.';
    public array $userArr;

    public function mount()
    {
        $this->userArr = [];
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.auth');
    }

    /**
     * @throws ValidationException
     */
    public function signin()
    {
        $this->validate($this->userRulesForLogin($this->prefix));

        try {
            $this->rateLimit(
                $maxAttempts = config('rateLimit.Login'),
                $decaySeconds = config('expire.Login'),
            );
        } catch (TooManyRequestsException $exception) {
            throw ValidationException::withMessages([
                'rateLimiting'
                => trans('rateLimiting.You have entered incorrect information :count times. please try again after :minute minutes.',
                    ['count' => config('rateLimit.Login') + 1, 'minute' => $exception->minutesUntilAvailable])
            ]);
        }

        if (! (new UserLogin($this->userArr))->login())
            throw ValidationException::withMessages([$this->prefix.'password' => trans('validation.Username or password is incorrect.')]);


        # TODO Login Successful Alert

        return redirect(config('redirect.After_Login'));
    }


}
