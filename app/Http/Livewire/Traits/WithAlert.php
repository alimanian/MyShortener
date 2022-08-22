<?php

namespace App\Http\Livewire\Traits;

trait WithAlert
{
    private function alert(array $alert, bool $dispatch = false)
    {
        # Set Alert Data
        $data = [
            'type'  => $alert['type']
        ];

        # Set Alert title if exists
        if (isset($alert['title']) && $alert['title'] != '')
            $data['title'] = $alert['title'];

        # Set Alert text if exists
        if (isset($alert['text']) && $alert['text'] != '')
            $data['text'] = $alert['text'];

        # Check Dispatch or Session
        if ($dispatch) {
            $this->dispatchBrowserEvent('swal-message', $data);
        } else {
            session()->flash('swal-message', $data);
        }
    }
}
