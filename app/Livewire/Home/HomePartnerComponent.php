<?php

namespace App\Livewire\Home;

use App\Livewire\Component;
use App\Services\PartnerService;
use Illuminate\Contracts\View\View;

class HomePartnerComponent extends Component
{
    public function getPartners(): object
    {
        return (new PartnerService)->index(
            isActive: [true],
            limit: 12,
            paginate: false,
        );
    }

    public function render(): View
    {
        return view('livewire.home.partner', [
            'partners' => $this->getPartners(),
        ]);
    }
}
