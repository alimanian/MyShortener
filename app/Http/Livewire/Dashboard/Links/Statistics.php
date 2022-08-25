<?php

namespace App\Http\Livewire\Dashboard\Links;

use App\Models\Link;
use Livewire\Component;

class Statistics extends Component
{
    public Link $link;
    public $statistics;
    public $period;

    public function mount(Link $link)
    {
        $this->link = $link;
        $this->statistics = 'browser';
        $this->period = 1;
    }

    public function render()
    {
        return view('livewire.dashboard.links.statistics');
    }

    public function update()
    {
        $statistics = $this->link->statistics()->where('created_at', '>', now()->subDays($this->period)->toDateTimeString())->get(["agent->$this->statistics as $this->statistics"]);
        $datasets = $statistics->groupBy($this->statistics)->map(function ($dataset){
            return $dataset->count();
        })->toArray();

        $datasetsArr = [
            'label' => trans('statistics.browser'),
            'keys' => array_keys($datasets),
            'values' => array_values($datasets),
        ];

        $this->dispatchBrowserEvent('chartjs', $datasetsArr);
    }
}
