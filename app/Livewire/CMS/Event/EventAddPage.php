<?php

namespace App\Livewire\CMS\Event;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Event\EventAddForm;
use Illuminate\Contracts\View\View;

class EventAddPage extends Component
{
    public EventAddForm $form;

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
            'html' => trans('index.event').' '.trans('index.has_been_successfully_added'),
        ]);

        $this->redirect(route('cms.event.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.event.add');
    }
}
