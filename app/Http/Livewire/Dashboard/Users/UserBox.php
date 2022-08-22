<?php

namespace App\Http\Livewire\Dashboard\Users;

use App\Actions\User\DeleteUser;
use App\Models\User;
use Livewire\Component;

class UserBox extends Component
{
    public User $user;
    public int $index;

    public function delete()
    {
        DeleteUser::delete($this->user->id);
        $this->emitUp('userDeleted');
    }

    public function render()
    {
        return view('livewire.dashboard.users.user-box');
    }
}
