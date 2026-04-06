<?php

namespace App\Livewire\CMS\Event;

use App\Livewire\Component;
use App\Models\Event;
use App\Services\EventService;
use Illuminate\Contracts\View\View;

class EventDetailPage extends Component
{
    public Event $event;

    public function mount(Event $event): void
    {
        $this->event = $event;
    }

    public function changeActive(Event $event): void
    {
        (new EventService)->active(event: $event);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.event').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(Event $event): void
    {
        (new EventService)->delete(event: $event);

        $this->flash('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.event').' '.trans('index.has_been_successfully_deleted'),
        ]);

        $this->redirect(route('cms.event.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.event.detail');
    }
}
