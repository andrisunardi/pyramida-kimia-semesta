<?php

namespace App\Livewire\Home;

use App\Livewire\Component;
use App\Services\EventService;
use Illuminate\Contracts\View\View;

class HomeEventComponent extends Component
{
    public function getEvents(): object
    {
        return (new EventService)->index(
            isActive: [true],
            limit: 3,
            paginate: false,
        );
    }

    public function render(): View
    {
        return view('livewire.home.event', [
            'events' => $this->getEvents(),
        ]);
    }
}
