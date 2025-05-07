<?php

namespace App\Livewire\CMS\Office;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Office\OfficeEditForm;
use App\Models\Office;

class OfficeEditPage extends Component
{
    public OfficeEditForm $form;

    public Office $office;

    public function mount(Office $office): void
    {
        $this->office = $office;
        $this->form->set(office: $office);
    }

    public function resetFields(): void
    {
        $this->form->set(office: $this->office);

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit(office: $this->office);

        $this->flash('success', trans('index.edit').' '.trans('index.success'), [
            'html' => trans('index.office').' '.trans('index.has_been_successfully_edited'),
        ]);

        $this->redirect(route('cms.office.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.cms.office.edit');
    }
}
