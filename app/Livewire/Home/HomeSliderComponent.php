<?php

namespace App\Livewire\Home;

use App\Livewire\Component;
use App\Services\SliderService;
use Illuminate\Contracts\View\View;

class HomeSliderComponent extends Component
{
    public function getSliders(): object
    {
        return (new SliderService)->index(
            isActive: [true],
            limit: 5,
            paginate: false,
        );
    }

    public function render(): View
    {
        return view('livewire.home.slider', [
            'sliders' => $this->getSliders(),
        ]);
    }
}
