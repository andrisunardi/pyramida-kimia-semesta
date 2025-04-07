<?php

namespace App\Livewire\CMS\Home;

use App\Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        return view('livewire.cms.home.index', [
            'bgClasses' => $this->getBgClasses(),
        ]);
    }
}
