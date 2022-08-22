<?php

namespace App\Http\Livewire\Traits;

trait WithToast
{
    private function toast(array $toast, bool $dispatch = false)
    {
        # Set Toast Data
        $data = [
            'type'  => $toast['type']
        ];

        # Set Toast title if exists
        if (isset($toast['title']) && $toast['title'] != '')
            $data['title'] = $toast['title'];

        # Set Toast text if exists
        if (isset($toast['text']) && $toast['text'] != '')
            $data['text'] = $toast['text'];

        # Check Dispatch or Session
        if ($dispatch) {
            $this->dispatchBrowserEvent('swal-toast', $data);
        } else {
            session()->flash('swal-toast', $data);
        }
    }
}
