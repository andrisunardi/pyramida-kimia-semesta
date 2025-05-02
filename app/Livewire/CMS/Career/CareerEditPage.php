<?php

namespace App\Livewire\CMS\Career;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Career\CareerEditForm;
use App\Models\Career;

class CareerEditPage extends Component
{
    public CareerEditForm $form;

    public Career $career;

    public function mount(Career $career): void
    {
        $this->career = $career;
        $this->form->set(career: $career);
    }

    public function resetFields(): void
    {
        $this->form->set(career: $this->career);

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit(career: $this->career);

        $this->flash('success', trans('index.edit').' '.trans('index.success'), [
            'html' => trans('index.career').' '.trans('index.has_been_successfully_edited'),
        ]);

        $this->redirect(route('cms.career.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.cms.career.edit');
    }
}
