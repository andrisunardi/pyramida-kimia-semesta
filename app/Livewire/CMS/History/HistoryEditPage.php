<?php

namespace App\Livewire\CMS\History;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\History\HistoryEditForm;
use App\Models\History;

class HistoryEditPage extends Component
{
    public HistoryEditForm $form;

    public History $history;

    public function mount(History $history): void
    {
        $this->history = $history;
        $this->form->set(history: $history);
    }

    public function resetFields(): void
    {
        $this->form->set(history: $this->history);

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit(history: $this->history);

        $this->flash('success', trans('index.edit').' '.trans('index.success'), [
            'html' => trans('index.history').' '.trans('index.has_been_successfully_edited'),
        ]);

        $this->redirect(route('cms.history.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.cms.history.edit');
    }
}
