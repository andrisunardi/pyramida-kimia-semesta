<?php

namespace App\Livewire\Team;

use App\Livewire\Component;
use App\Services\TeamService;
use Illuminate\Contracts\View\View;

class TeamPage extends Component
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
        return view('livewire.team.index', [
            'teams' => $this->getTeams(),
        ]);
    }
}
