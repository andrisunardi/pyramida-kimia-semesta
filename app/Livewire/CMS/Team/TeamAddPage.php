<?php

namespace App\Livewire\CMS\Team;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Team\TeamAddForm;
use Illuminate\Contracts\View\View;

class TeamAddPage extends Component
{
    public TeamAddForm $form;

    public function resetFields(): void
    {
        $this->form->reset();

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit();

        $this->flash('success', trans('index.add').' '.trans('index.success'), [
            'html' => trans('index.team').' '.trans('index.has_been_successfully_added'),
        ]);

        $this->redirect(route('cms.team.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.team.add');
    }
}
