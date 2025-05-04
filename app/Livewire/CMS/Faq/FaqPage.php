<?php

namespace App\Livewire\CMS\Faq;

use App\Exports\FaqExport;
use App\Livewire\Component;
use App\Models\Faq;
use App\Services\FaqService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FaqPage extends Component
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

    public function changeActive(Faq $faq): void
    {
        (new FaqService)->active(faq: $faq);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.faq').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(Faq $faq): void
    {
        (new FaqService)->delete(faq: $faq);

        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.faq').' '.trans('index.has_been_successfully_deleted'),
        ]);
    }

    public function getFaqs(bool $paginate = true): object
    {
        return (new FaqService)->index(
            search: $this->search,
            isActive: $this->is_active,
            paginate: $paginate,
        );
    }

    public function exportToExcel(): BinaryFileResponse
    {
        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.faq').' '.trans('index.has_been_successfully_exported'),
        ]);

        return Excel::download(new FaqExport(
            faqs: $this->getFaqs(paginate: false),
        ), trans('index.faq').'.xlsx');
    }

    public function render(): View
    {
        return view('livewire.cms.faq.index', [
            'faqs' => $this->getFaqs(),
        ]);
    }
}
