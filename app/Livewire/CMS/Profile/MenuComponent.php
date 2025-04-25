<?php

namespace App\Livewire\CMS\Profile;

use App\Livewire\Component;
use Illuminate\Contracts\View\View;

class MenuComponent extends Component
{
    public function render(): View
    {
        return view('livewire.cms.profile.menu');
    }
}
