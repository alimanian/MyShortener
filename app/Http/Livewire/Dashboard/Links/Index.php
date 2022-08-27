<?php

namespace App\Http\Livewire\Dashboard\Links;

use App\Http\Livewire\Traits\WithToast;
use App\Models\Link as LinkModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithToast, AuthorizesRequests;

    public $search;

    protected $listeners = ['linkDeleted' => 'linkDelete'];

    public function mount()
    {
        $this->authorize('show-links');
    }

    public function render()
    {
        return view('livewire.dashboard.links.index', [
            'links' => LinkModel::where('title', 'LIKE', '%' . $this->search . '%')
                ->orWhere('slug', 'LIKE', '%' . $this->search . '%')
                ->orWhere('description', 'LIKE', '%' . $this->search . '%')
                ->orWhere('destination', 'LIKE', '%' . $this->search . '%')
                ->latest()
                ->paginate(10),
        ]);
    }

    public function linkDelete()
    {
        $this->toast(trans('toast.Successful link removal'), true);
    }
}
