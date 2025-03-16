<?php

namespace App\Livewire\Home;

use App\Livewire\Component;
use App\Services\SliderService;

class HomeSliderComponent extends Component
{
    public function getSliders()
    {
        return (new SliderService)->index(
            isActive: [true],
            limit: 5,
            paginate: false,
        );
    }

    public function render()
    {
        return view('livewire.home.slider', [
            'sliders' => $this->getSliders(),
        ]);
    }
}
