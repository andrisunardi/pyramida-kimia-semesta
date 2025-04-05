<?php

namespace App\Livewire\Layouts;

use App\Livewire\Component;
use Illuminate\Contracts\View\View;

class Error extends Component
{
    public function render(): View
    {
        return view('livewire.layouts.error');
    }
}
