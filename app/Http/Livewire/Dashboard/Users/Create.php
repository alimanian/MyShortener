<?php

namespace App\Http\Livewire\Dashboard\Users;

use App\Actions\User\CreateNewUser;
use App\Actions\User\UserValidationRule;
use App\Actions\VerifyCode\VerifyCode;
use App\Http\Livewire\Auth\Verify;
use App\Http\Livewire\Traits\WithRateLimiting;
use Livewire\Component;

class Create extends Component
{
    use UserValidationRule;

    public string $prefix = 'userArr.';
    public array $userArr;

    public function mount()
    {
        $this->userArr = [];
    }

    public function render()
    {
        return view('livewire.dashboard.users.create');
    }

    public function create()
    {
        $this->validate($this->userRulesForRegister($this->prefix));

        (new CreateNewUser())->create($this->userArr);

        return redirect(route('dashboard.users'));
    }
}
