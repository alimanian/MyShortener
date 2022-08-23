<?php

namespace App\Http\Livewire\Auth;

use App\Actions\User\CreateNewRole;
use App\Actions\User\UserValidationRule;
use App\Actions\VerifyCode\VerifyCode;
use App\Http\Livewire\Traits\WithRateLimiting;
use Livewire\Component;

class Register extends Component
{
    use UserValidationRule, Verify, WithRateLimiting;

    const Register = 0, Verify = 1;
    public string $prefix = 'userArr.';
    public array $userArr;
    public int $view;

    public function mount()
    {
        $this->userArr = [];
        $this->view = self::Register;
    }

    public function render()
    {
        $view = match ($this->view){
            self::Register => 'livewire.auth.register',
            self::Verify => 'livewire.auth.verify'
        };

        return view($view)->layout('layouts.auth');
    }

    public function signup()
    {
        $this->validate($this->userRulesForRegister($this->prefix));

        $verifyCode = new VerifyCode($this->userArr['phone_number']);

        $activeCode = $verifyCode->create();
        $verifyCode->sendCode($activeCode, trans('kavenegar.VerificationCode-Register'));

        $this->clearRateLimiter('verify');
        $this->view = self::Verify;
    }

    protected function actionAfterCodeIsValid(): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $user = (new CreateNewRole())->create($this->userArr);
        # TODO Run the user registration event. This item will be added in the future.
        auth()->login($user);
        # TODO DELETE Verify Code
        # TODO Set Swal Message
        return redirect(config('redirect.After_Register'));
    }

    protected function rateLimitRedirectURL(): string
    {
        return route('register');
    }

    protected function prefix(): string
    {
        return $this->prefix;
    }

    protected function phoneNumber(): string
    {
        return $this->userArr['phone_number'];
    }

    protected function verifyCode(): string
    {
        return $this->userArr['verify_code'];
    }
}
