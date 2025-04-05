<?php

namespace App\Livewire\About;

use App\Livewire\Component;
use Illuminate\Contracts\View\View;

class AboutPage extends Component
{
    public function render(): View
    {
        return view('livewire.about.index');
    }
}
