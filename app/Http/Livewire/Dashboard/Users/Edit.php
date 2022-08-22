<?php

namespace App\Http\Livewire\Dashboard\Users;

use App\Actions\User\UpdateUser;
use App\Actions\User\UserValidationRule;
use App\Http\Livewire\Traits\WithToast;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    use UserValidationRule, WithToast;

    public string $prefix = 'userArr.';
    public array $userArr;

    public function mount(User $user)
    {
        $this->userArr = $user->toArray();
    }

    public function render()
    {
        return view('livewire.dashboard.users.edit');
    }

    public function update()
    {
        $this->validate($this->userRulesForUpdate($this->userArr['id'], $this->prefix));

        (new UpdateUser())->update($this->userArr['id'], $this->userArr);

        $this->toast(trans('toast.Successful user updated'));
        return redirect(route('dashboard.users'));
    }
}
