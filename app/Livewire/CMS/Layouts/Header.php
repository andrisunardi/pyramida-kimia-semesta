<?php

namespace App\Livewire\CMS\Layouts;

use App\Livewire\Component;
use Illuminate\Contracts\View\View;

class Header extends Component
{
    public function render(): View
    {
        return view('livewire.cms.layouts.header');
    }
}
