<?php

namespace App\Http\Livewire\Dashboard\Users;

use App\Actions\User\CreateNewRole;
use App\Actions\User\UserValidationRule;
use App\Http\Livewire\Traits\WithToast;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Livewire\Component;

class Create extends Component
{
    use UserValidationRule, WithToast, AuthorizesRequests;


    public string $prefix = 'userArr.';
    public array $userArr;

    public function mount()
    {
        $this->authorize('create-users');

        $this->userArr = [];
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.dashboard.users.create');
    }

    public function create(): Redirector|Application|RedirectResponse
    {
        $this->validate($this->userRulesForRegister($this->prefix));

        (new CreateNewRole())->create($this->userArr);

        $this->toast(trans('toast.Successful user creation'));
        return redirect(route('dashboard.users'));
    }
}
