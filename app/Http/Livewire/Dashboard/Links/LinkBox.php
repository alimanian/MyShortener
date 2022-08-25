<?php

namespace App\Http\Livewire\Dashboard\Links;

use App\Actions\Category\DeleteCategory;
use App\Actions\Link\DeleteLink;
use App\Models\Link as LinkModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class LinkBox extends Component
{
    use AuthorizesRequests;

    public LinkModel $link;
    public int $index;

    public function delete()
    {
        $this->authorize('delete-links');

        DeleteLink::delete($this->link->id);

        $this->emitUp('linkDeleted');
    }

    public function render()
    {
        return view('livewire.dashboard.links.link-box');
    }
}
