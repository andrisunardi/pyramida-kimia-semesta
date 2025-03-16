<?php

namespace App\Livewire\Home;

use App\Livewire\Component;
use App\Services\PartnerService;

class HomePartnerComponent extends Component
{
    public function getPartners()
    {
        return (new PartnerService)->index(
            isActive: [true],
            limit: 12,
            paginate: false,
        );
    }

    public function render()
    {
        return view('livewire.home.partner', [
            'partners' => $this->getPartners(),
        ]);
    }
}
