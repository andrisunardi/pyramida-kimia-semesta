<?php

namespace App\Livewire\Team;

use App\Livewire\Component;
use App\Models\Team;
use App\Services\TeamService;
use Illuminate\Contracts\View\View;

class TeamViewPage extends Component
{
    public ?Team $team;

    public function mount(string $slug): void
    {
        $this->team = Team::where('slug', $slug)->active()->first();

        if (! $this->team) {
            $this->flash('error', trans('index.team').' '.trans('index.not_found'), [
                'html' => trans('index.please_try_again_later'),
            ]);

            $this->redirect(route('team.index'), navigate: true);
        }
    }

    public function getOtherTeams(): object
    {
        return (new TeamService)->index(
            isActive: [true],
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        )->reject(fn ($team) => $team->id == $this->team->id);
    }

    public function render(): View
    {
        return view('livewire.team.view', [
            'otherTeams' => $this->getOtherTeams(),
        ]);
    }
}
