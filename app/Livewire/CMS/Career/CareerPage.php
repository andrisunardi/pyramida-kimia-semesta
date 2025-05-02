<?php

namespace App\Livewire\CMS\Career;

use App\Exports\CareerExport;
use App\Livewire\Component;
use App\Models\Career;
use App\Services\CareerService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CareerPage extends Component
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

    public function changeActive(Career $career): void
    {
        (new CareerService)->active(career: $career);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.career').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(Career $career): void
    {
        (new CareerService)->delete(career: $career);

        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.career').' '.trans('index.has_been_successfully_deleted'),
        ]);
    }

    public function getCareers(bool $paginate = true): object
    {
        return (new CareerService)->index(
            search: $this->search,
            isActive: $this->is_active,
            paginate: $paginate,
        );
    }

    public function exportToExcel(): BinaryFileResponse
    {
        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.career').' '.trans('index.has_been_successfully_exported'),
        ]);

        return Excel::download(new CareerExport(
            careers: $this->getCareers(paginate: false),
        ), trans('index.career').'.xlsx');
    }

    public function render(): View
    {
        return view('livewire.cms.career.index', [
            'careers' => $this->getCareers(),
        ]);
    }
}
