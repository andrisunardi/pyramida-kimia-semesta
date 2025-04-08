<?php

namespace App\Livewire\CMS\Layouts;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Theme extends Component
{
    public function render(): View
    {
        return view('livewire.cms.layouts.theme');
    }
}
