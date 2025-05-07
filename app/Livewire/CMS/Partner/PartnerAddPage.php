<?php

namespace App\Livewire\CMS\Partner;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Partner\PartnerAddForm;
use Illuminate\Contracts\View\View;

class PartnerAddPage extends Component
{
    public PartnerAddForm $form;

    public function resetFields(): void
    {
        $this->form->reset();

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit();

        $this->flash('success', trans('index.add').' '.trans('index.success'), [
            'html' => trans('index.partner').' '.trans('index.has_been_successfully_added'),
        ]);

        $this->redirect(route('cms.partner.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.partner.add');
    }
}
