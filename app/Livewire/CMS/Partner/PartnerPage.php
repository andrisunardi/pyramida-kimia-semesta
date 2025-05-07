<?php

namespace App\Livewire\CMS\Partner;

use App\Exports\PartnerExport;
use App\Livewire\Component;
use App\Models\Partner;
use App\Services\PartnerService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PartnerPage extends Component
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

    public function changeActive(Partner $partner): void
    {
        (new PartnerService)->active(partner: $partner);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.partner').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(Partner $partner): void
    {
        (new PartnerService)->delete(partner: $partner);

        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.partner').' '.trans('index.has_been_successfully_deleted'),
        ]);
    }

    public function getPartners(bool $paginate = true): object
    {
        return (new PartnerService)->index(
            search: $this->search,
            isActive: $this->is_active,
            paginate: $paginate,
        );
    }

    public function exportToExcel(): BinaryFileResponse
    {
        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.partner').' '.trans('index.has_been_successfully_exported'),
        ]);

        return Excel::download(new PartnerExport(
            partners: $this->getPartners(paginate: false),
        ), trans('index.partner').'.xlsx');
    }

    public function render(): View
    {
        return view('livewire.cms.partner.index', [
            'partners' => $this->getPartners(),
        ]);
    }
}
