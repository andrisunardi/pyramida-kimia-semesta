<?php

namespace App\Livewire\CMS\History;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\History\HistoryAddForm;
use Illuminate\Contracts\View\View;

class HistoryAddPage extends Component
{
    public HistoryAddForm $form;

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
            'html' => trans('index.history').' '.trans('index.has_been_successfully_added'),
        ]);

        $this->redirect(route('cms.history.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.history.add');
    }
}
