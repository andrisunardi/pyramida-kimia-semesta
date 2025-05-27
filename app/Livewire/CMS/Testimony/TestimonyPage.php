<?php

namespace App\Livewire\CMS\Testimony;

use App\Exports\TestimonyExport;
use App\Livewire\Component;
use App\Models\Testimony;
use App\Services\TestimonyService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class TestimonyPage extends Component
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

    public function changeActive(Testimony $testimony): void
    {
        (new TestimonyService)->active(testimony: $testimony);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.testimony').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(Testimony $testimony): void
    {
        (new TestimonyService)->delete(testimony: $testimony);

        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.testimony').' '.trans('index.has_been_successfully_deleted'),
        ]);
    }

    public function getTestimonies(bool $paginate = true): object
    {
        return (new TestimonyService)->index(
            search: $this->search,
            isActive: $this->is_active,
            paginate: $paginate,
        );
    }

    public function exportToExcel(): BinaryFileResponse
    {
        $this->alert('success', trans('index.export_to_excel').' '.trans('index.success'), [
            'html' => trans('index.testimony').' '.trans('index.has_been_successfully_exported'),
        ]);

        return Excel::download(new TestimonyExport(
            testimonies: $this->getTestimonies(paginate: false),
        ), trans('index.testimony').'.xlsx');
    }

    public function render(): View
    {
        return view('livewire.cms.testimony.index', [
            'testimonies' => $this->getTestimonies(),
        ]);
    }
}
