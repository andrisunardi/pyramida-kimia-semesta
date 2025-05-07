<?php

namespace App\Livewire\CMS\Office;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Office\OfficeAddForm;
use Illuminate\Contracts\View\View;

class OfficeAddPage extends Component
{
    public OfficeAddForm $form;

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
            'html' => trans('index.office').' '.trans('index.has_been_successfully_added'),
        ]);

        $this->redirect(route('cms.office.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.office.add');
    }
}
