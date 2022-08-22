<?php

namespace App\Http\Livewire\Dashboard\Users;

use App\Models\User as UserModel;
use Livewire\Component;

class Index extends Component
{
    public array $users;

    public function mount()
    {
        $this->users = UserModel::all()->toArray();
    }

    public function render()
    {
        return view('livewire.dashboard.users.index');
    }
}
