<?php

namespace App\Livewire\CMS\Layouts;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class ServerTime extends Component
{
    public function render(): View
    {
        return view('livewire.cms.layouts.server-time');
    }
}
