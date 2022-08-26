<?php

namespace App\Http\Livewire\Dashboard\Links;

use App\Actions\Category\CreateNewCategory;
use App\Actions\Link\CreateNewLink;
use App\Actions\Link\LinkValidationRule;
use App\Http\Livewire\Traits\WithToast;
use App\Models\Category;
use App\Models\Link;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use function Composer\Autoload\includeFile;

class Create extends Component
{
    use WithToast, LinkValidationRule, AuthorizesRequests;

    public string $prefix = 'linkArr.';
    public array $linkArr;

    public function mount()
    {
        $this->authorize('create-links');

        $this->linkArr = [];
        $this->linkArr['is_active'] = true;
        $this->linkArr['code'] = 302;
        $this->linkArr['category_id'] = null;
        $this->linkArr['slug'] = $this->generateRandomStr();
    }

    public function render()
    {
        return view('livewire.dashboard.links.create', [
            'categories' => Category::all()
        ]);
    }

    private function generateRandomStr()
    {
        do {
            $str = \Str::random(6);
        } while (!! Link::where('slug', $str)->first());

        return $str;
    }

    public function create()
    {
        $this->validate($this->linkRulesForCreate($this->prefix));

        (new CreateNewLink())->create($this->linkArr);

        $this->toast(trans('toast.Successful link creation'));

        return redirect(route('dashboard.links'));
    }
}
