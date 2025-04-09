<?php

namespace App\Livewire\CMS\Layouts;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Profile extends Component
{
    public function render(): View
    {
        return view('livewire.cms.layouts.profile');
    }
}
