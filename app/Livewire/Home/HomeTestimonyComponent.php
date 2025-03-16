<?php

namespace App\Livewire\Home;

use App\Livewire\Component;
use App\Services\TestimonyService;

class HomeTestimonyComponent extends Component
{
    public function getTestimonies()
    {
        return (new TestimonyService)->index(
            isActive: [true],
            limit: 10,
            paginate: false,
        );
    }

    public function render()
    {
        return view('livewire.home.testimony', [
            'testimonies' => $this->getTestimonies(),
        ]);
    }
}
