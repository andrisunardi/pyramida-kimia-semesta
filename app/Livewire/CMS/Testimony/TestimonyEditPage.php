<?php

namespace App\Livewire\CMS\Testimony;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Testimony\TestimonyEditForm;
use App\Models\Testimony;

class TestimonyEditPage extends Component
{
    public TestimonyEditForm $form;

    public Testimony $testimony;

    public function mount(Testimony $testimony): void
    {
        $this->testimony = $testimony;
        $this->form->set(testimony: $testimony);
    }

    public function resetFields(): void
    {
        $this->form->set(testimony: $this->testimony);

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit(testimony: $this->testimony);

        $this->flash('success', trans('index.edit').' '.trans('index.success'), [
            'html' => trans('index.testimony').' '.trans('index.has_been_successfully_edited'),
        ]);

        $this->redirect(route('cms.testimony.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.cms.testimony.edit');
    }
}
