<?php

namespace App\Livewire\CMS;

use App\Livewire\Component;
use Illuminate\Contracts\View\View;

class Loader extends Component
{
    public function render(): View
    {
        return view('livewire.cms.loader');
    }
}
