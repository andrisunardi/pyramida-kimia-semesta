<?php

namespace App\Livewire\Home;

use App\Livewire\Component;
use Illuminate\Contracts\View\View;

class HomePage extends Component
{
    public function render(): View
    {
        return view('livewire.home.index');
    }
}
