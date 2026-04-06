<?php

namespace App\Livewire\CMS\Event;

use App\Exports\EventExport;
use App\Livewire\Component;
use App\Models\Event;
use App\Services\EventService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class EventPage extends Component
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

        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.event').' '.trans('index.has_been_successfully_deleted'),
        ]);
    }

    public function getEvents(bool $paginate = true): object
    {
        return (new EventService)->index(
            search: $this->search,
            isActive: $this->is_active,
            paginate: $paginate,
        );
    }

    public function exportToExcel(): BinaryFileResponse
    {
        $this->alert('success', trans('index.export_to_excel').' '.trans('index.success'), [
            'html' => trans('index.event').' '.trans('index.has_been_successfully_exported'),
        ]);

        return Excel::download(new EventExport(
            events: $this->getEvents(paginate: false),
        ), trans('index.event').'.xlsx');
    }

    public function render(): View
    {
        return view('livewire.cms.event.index', [
            'events' => $this->getEvents(),
        ]);
    }
}
