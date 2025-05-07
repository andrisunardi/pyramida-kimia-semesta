<?php

namespace App\Livewire\CMS\Slider;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Slider\SliderAddForm;
use Illuminate\Contracts\View\View;

class SliderAddPage extends Component
{
    public SliderAddForm $form;

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
            'html' => trans('index.slider').' '.trans('index.has_been_successfully_added'),
        ]);

        $this->redirect(route('cms.slider.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.slider.add');
    }
}
