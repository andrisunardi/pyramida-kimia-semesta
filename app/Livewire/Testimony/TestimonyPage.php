<?php

namespace App\Livewire\Testimony;

use App\Livewire\Component;
use App\Services\TestimonyService;
use Illuminate\Contracts\View\View;

class TestimonyPage extends Component
{
    public function getTestimonies(): object
    {
        return (new TestimonyService)->index(
            isActive: [true],
            paginate: false,
        );
    }

    public function render(): View
    {
        return view('livewire.testimony.index', [
            'testimonies' => $this->getTestimonies(),
        ]);
    }
}
