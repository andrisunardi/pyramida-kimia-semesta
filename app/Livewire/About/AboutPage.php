<?php

namespace App\Livewire\About;

use App\Livewire\Component;
use App\Services\TeamService;
use Illuminate\Contracts\View\View;

class AboutPage extends Component
{
    public function getTeams(): object
    {
        return (new TeamService)->index(
            isActive: [true],
            paginate: false,
        );
    }

    public function render(): View
    {
        return view('livewire.about.index', [
            'teams' => $this->getTeams(),
        ]);
    }
}
