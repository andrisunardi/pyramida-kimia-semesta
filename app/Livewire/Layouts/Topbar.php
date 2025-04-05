<?php

namespace App\Livewire\Layouts;

use App\Livewire\Component;
use Illuminate\Contracts\View\View;

class Topbar extends Component
{
    public function render(): View
    {
        return view('livewire.layouts.topbar');
    }
}
