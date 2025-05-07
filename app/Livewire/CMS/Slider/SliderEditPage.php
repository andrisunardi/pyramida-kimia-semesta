<?php

namespace App\Livewire\CMS\Slider;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Slider\SliderEditForm;
use App\Models\Slider;

class SliderEditPage extends Component
{
    public SliderEditForm $form;

    public Slider $slider;

    public function mount(Slider $slider): void
    {
        $this->slider = $slider;
        $this->form->set(slider: $slider);
    }

    public function resetFields(): void
    {
        $this->form->set(slider: $this->slider);

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit(slider: $this->slider);

        $this->flash('success', trans('index.edit').' '.trans('index.success'), [
            'html' => trans('index.slider').' '.trans('index.has_been_successfully_edited'),
        ]);

        $this->redirect(route('cms.slider.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.cms.slider.edit');
    }
}
