<?php

namespace App\Http\Livewire\Dashboard\Links;

use App\Actions\Link\CreateNewLink;
use App\Actions\Link\LinkValidationRule;
use App\Actions\Link\UpdateLink;
use App\Http\Livewire\Traits\WithToast;
use App\Models\Category;
use App\Models\Link;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Edit extends Component
{
    use WithToast, LinkValidationRule, AuthorizesRequests;

    public string $prefix = 'linkArr.';
    public array $linkArr;

    public function mount(Link $link)
    {
        $this->authorize('update-links');

        $this->linkArr = $link->toArray();
    }

    public function render()
    {
        return view('livewire.dashboard.links.edit', [
            'categories' => Category::all()
        ]);
    }

    public function update()
    {
        $this->validate($this->linkRulesForUpdate($this->linkArr['id'], $this->prefix));

        (new UpdateLink())->update($this->linkArr['id'], $this->linkArr);

        $this->toast(trans('toast.Successful link updated'));

        return redirect(route('dashboard.links'));
    }
}
