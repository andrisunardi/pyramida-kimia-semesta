<?php

namespace App\Livewire\CMS\Office;

use App\Exports\OfficeExport;
use App\Livewire\Component;
use App\Models\Office;
use App\Services\OfficeService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class OfficePage extends Component
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

    public function changeActive(Office $office): void
    {
        (new OfficeService)->active(office: $office);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.office').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(Office $office): void
    {
        (new OfficeService)->delete(office: $office);

        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.office').' '.trans('index.has_been_successfully_deleted'),
        ]);
    }

    public function getOffices(bool $paginate = true): object
    {
        return (new OfficeService)->index(
            search: $this->search,
            isActive: $this->is_active,
            paginate: $paginate,
        );
    }

    public function exportToExcel(): BinaryFileResponse
    {
        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.office').' '.trans('index.has_been_successfully_exported'),
        ]);

        return Excel::download(new OfficeExport(
            offices: $this->getOffices(paginate: false),
        ), trans('index.office').'.xlsx');
    }

    public function render(): View
    {
        return view('livewire.cms.office.index', [
            'offices' => $this->getOffices(),
        ]);
    }
}
