<?php

namespace App\Livewire\CMS\Team;

use App\Exports\TeamExport;
use App\Livewire\Component;
use App\Models\Team;
use App\Services\TeamService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class TeamPage extends Component
{
    #[Url(except: '')]
    public $search = '';

    #[Url(except: [])]
    public $is_active = [];

    public function resetFields(): void
    {
        $this->resetPage();

        $this->reset([
            'search',
            'is_active',
        ]);

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function updating(): void
    {
        $this->resetPage();
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

        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.team').' '.trans('index.has_been_successfully_deleted'),
        ]);
    }

    public function getTeams(bool $paginate = true): object
    {
        return (new TeamService)->index(
            search: $this->search,
            isActive: $this->is_active,
            paginate: $paginate,
        );
    }

    public function exportToExcel(): BinaryFileResponse
    {
        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.team').' '.trans('index.has_been_successfully_exported'),
        ]);

        return Excel::download(new TeamExport(
            teams: $this->getTeams(paginate: false),
        ), trans('index.team').'.xlsx');
    }

    public function render(): View
    {
        return view('livewire.cms.team.index', [
            'teams' => $this->getTeams(),
        ]);
    }
}
