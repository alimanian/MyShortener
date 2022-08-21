<?php

namespace App\Http\Livewire\Auth;

use App\Actions\User\UpdateUserPassword;
use App\Actions\User\UserValidationRule;
use App\Actions\VerifyCode\VerifyCode;
use App\Http\Livewire\Traits\WithRateLimiting;
use Livewire\Component;

class Forget extends Component
{
    use UserValidationRule, Verify, WithRateLimiting;

    const Forget = 0, Verify = 1;
    public string $prefix = 'userArr.';
    public array $userArr;
    public int $view;

    public function mount()
    {
        $this->userArr = [];
        $this->view = self::Forget;
    }

    public function render()
    {
        $view = match ($this->view){
            self::Forget => 'livewire.auth.forget',
            self::Verify => 'livewire.auth.verify'
        };

        return view($view)->layout('layouts.auth');
    }

    public function forget()
    {
        $this->validate($this->userRulesForForget($this->prefix));

        $verifyCode = new VerifyCode($this->userArr['phone_number']);

        $activeCode = $verifyCode->create();
        $verifyCode->sendCode($activeCode, trans('kavenegar.VerificationCode-Forget'));

        $this->clearRateLimiter('verify');
        $this->view = self::Verify;
    }

    protected function actionAfterCodeIsValid(): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $user = (new UpdateUserPassword())->update($this->userArr);
        # TODO Run the user registration event. This item will be added in the future.
        auth()->login($user);
        # TODO Set Swal Message
        return redirect(config('redirect.After_Forget'));
    }

    protected function rateLimitRedirectURL(): string
    {
        return route('forget');
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
