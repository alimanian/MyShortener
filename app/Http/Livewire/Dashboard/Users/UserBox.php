<?php

namespace App\Http\Livewire\Dashboard\Users;

use App\Actions\User\DeleteUser;
use Livewire\Component;

class UserBox extends Component
{
    public array $user;
    public int $index;

    public function delete()
    {
        DeleteUser::delete($this->user['id']);
    }

    public function render()
    {
        return view('livewire.dashboard.users.user-box');
    }
}
