<?php

namespace App\Livewire\CMS\History;

use App\Exports\HistoryExport;
use App\Livewire\Component;
use App\Models\History;
use App\Services\HistoryService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class HistoryPage extends Component
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

    public function changeActive(History $history): void
    {
        (new HistoryService)->active(history: $history);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.history').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(History $history): void
    {
        (new HistoryService)->delete(history: $history);

        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.history').' '.trans('index.has_been_successfully_deleted'),
        ]);
    }

    public function getHistories(bool $paginate = true): object
    {
        return (new HistoryService)->index(
            search: $this->search,
            isActive: $this->is_active,
            paginate: $paginate,
        );
    }

    public function exportToExcel(): BinaryFileResponse
    {
        $this->alert('success', trans('index.export_to_excel').' '.trans('index.success'), [
            'html' => trans('index.history').' '.trans('index.has_been_successfully_exported'),
        ]);

        return Excel::download(new HistoryExport(
            histories: $this->getHistories(paginate: false),
        ), trans('index.history').'.xlsx');
    }

    public function render(): View
    {
        return view('livewire.cms.history.index', [
            'histories' => $this->getHistories(),
        ]);
    }
}
