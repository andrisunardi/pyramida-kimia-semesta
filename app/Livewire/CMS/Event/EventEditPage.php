<?php

namespace App\Livewire\CMS\Event;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Event\EventEditForm;
use App\Models\Event;

class EventEditPage extends Component
{
    public EventEditForm $form;

    public Event $event;

    public function mount(Event $event): void
    {
        $this->event = $event;
        $this->form->set(event: $event);
    }

    public function resetFields(): void
    {
        $this->form->set(event: $this->event);

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit(event: $this->event);

        $this->flash('success', trans('index.edit').' '.trans('index.success'), [
            'html' => trans('index.event').' '.trans('index.has_been_successfully_edited'),
        ]);

        $this->redirect(route('cms.event.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.cms.event.edit');
    }
}
