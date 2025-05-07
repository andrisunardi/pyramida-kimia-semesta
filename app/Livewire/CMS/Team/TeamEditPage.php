<?php

namespace App\Livewire\CMS\Team;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Team\TeamEditForm;
use App\Models\Team;

class TeamEditPage extends Component
{
    public TeamEditForm $form;

    public Team $team;

    public function mount(Team $team): void
    {
        $this->team = $team;
        $this->form->set(team: $team);
    }

    public function resetFields(): void
    {
        $this->form->set(team: $this->team);

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit(team: $this->team);

        $this->flash('success', trans('index.edit').' '.trans('index.success'), [
            'html' => trans('index.team').' '.trans('index.has_been_successfully_edited'),
        ]);

        $this->redirect(route('cms.team.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.cms.team.edit');
    }
}
