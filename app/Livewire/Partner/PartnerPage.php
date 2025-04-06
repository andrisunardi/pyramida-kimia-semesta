<?php

namespace App\Livewire\Partner;

use App\Livewire\Component;
use App\Services\PartnerService;
use Illuminate\Contracts\View\View;

class PartnerPage extends Component
{
    public function getPartners(): object
    {
        return (new PartnerService)->index(
            isActive: [true],
            paginate: false,
        );
    }

    public function render(): View
    {
        return view('livewire.partner.index', [
            'partners' => $this->getPartners(),
        ]);
    }
}
