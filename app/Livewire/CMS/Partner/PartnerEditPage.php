<?php

namespace App\Livewire\CMS\Partner;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Partner\PartnerEditForm;
use App\Models\Partner;

class PartnerEditPage extends Component
{
    public PartnerEditForm $form;

    public Partner $partner;

    public function mount(Partner $partner): void
    {
        $this->partner = $partner;
        $this->form->set(partner: $partner);
    }

    public function resetFields(): void
    {
        $this->form->set(partner: $this->partner);

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit(partner: $this->partner);

        $this->flash('success', trans('index.edit').' '.trans('index.success'), [
            'html' => trans('index.partner').' '.trans('index.has_been_successfully_edited'),
        ]);

        $this->redirect(route('cms.partner.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.cms.partner.edit');
    }
}
