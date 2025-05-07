<?php

namespace App\Livewire\CMS\Team;

use App\Livewire\Component;
use App\Models\Team;
use App\Services\TeamService;
use Illuminate\Contracts\View\View;

class TeamDetailPage extends Component
{
    public Team $team;

    public function mount(Team $team): void
    {
        $this->team = $team;
    }

    public function changeActive(Team $team): void
    {
        (new TeamService)->active(team: $team);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.team').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(Team $team): void
    {
        (new TeamService)->delete(team: $team);

        $this->flash('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.team').' '.trans('index.has_been_successfully_deleted'),
        ]);

        $this->redirect(route('cms.team.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.team.detail');
    }
}
