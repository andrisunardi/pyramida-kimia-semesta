<?php

namespace App\Livewire\CMS\Slider;

use App\Livewire\Component;
use App\Models\Slider;
use App\Services\SliderService;
use Illuminate\Contracts\View\View;

class SliderDetailPage extends Component
{
    public Slider $slider;

    public function mount(Slider $slider): void
    {
        $this->slider = $slider;
    }

    public function changeActive(Slider $slider): void
    {
        (new SliderService)->active(slider: $slider);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.slider').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(Slider $slider): void
    {
        (new SliderService)->delete(slider: $slider);

        $this->flash('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.slider').' '.trans('index.has_been_successfully_deleted'),
        ]);

        $this->redirect(route('cms.slider.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.slider.detail');
    }
}
