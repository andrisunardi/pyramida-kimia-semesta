<?php

namespace App\Livewire\Testimony;

use App\Livewire\Component;
use App\Services\TestimonyService;

class TestimonyPage extends Component
{
    public function getTestimonies()
    {
        return (new TestimonyService)->index(
            isActive: [true],
            paginate: false,
        );
    }

    public function render()
    {
        return view('livewire.testimony.index', [
            'testimonies' => $this->getTestimonies(),
        ]);
    }
}
