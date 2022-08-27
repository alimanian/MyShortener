<?php

namespace App\Http\Livewire\Dashboard\Users;

use App\Http\Livewire\Traits\WithToast;
use App\Models\User as UserModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithToast, AuthorizesRequests;


    public $search;

    protected $listeners = ['userDeleted' => 'userDelete'];

    public function mount()
    {
        $this->authorize('show-users');
    }

    public function render()
    {
        return view('livewire.dashboard.users.index', [
            'users' => UserModel::where('first_name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('last_name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                ->orWhere('phone_number', 'LIKE', '%' . $this->search . '%')
                ->latest()
                ->paginate(10),
        ]);
    }

    public function userDelete()
    {
        $this->toast(trans('toast.Successful user removal'), true);
    }
}
