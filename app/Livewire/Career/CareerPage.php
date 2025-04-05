<?php

namespace App\Livewire\Career;

use App\Livewire\Component;
use Illuminate\Contracts\View\View;

class CareerPage extends Component
{
    public function render(): View
    {
        return view('livewire.career.index');
    }
}
