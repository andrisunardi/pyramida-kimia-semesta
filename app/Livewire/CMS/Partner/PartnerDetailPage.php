<?php

namespace App\Livewire\CMS\Partner;

use App\Livewire\Component;
use App\Models\Partner;
use App\Services\PartnerService;
use Illuminate\Contracts\View\View;

class PartnerDetailPage extends Component
{
    public Partner $partner;

    public function mount(Partner $partner): void
    {
        $this->partner = $partner;
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

        $this->flash('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.partner').' '.trans('index.has_been_successfully_deleted'),
        ]);

        $this->redirect(route('cms.partner.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.partner.detail');
    }
}
