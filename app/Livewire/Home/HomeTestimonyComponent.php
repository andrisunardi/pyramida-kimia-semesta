<?php

namespace App\Livewire\Home;

use App\Livewire\Component;
use App\Services\TestimonyService;
use Illuminate\Contracts\View\View;

class HomeTestimonyComponent extends Component
{
    public function getTestimonies(): object
    {
        return (new TestimonyService)->index(
            isActive: [true],
            limit: 10,
            paginate: false,
        );
    }

    public function render(): View
    {
        return view('livewire.home.testimony', [
            'testimonies' => $this->getTestimonies(),
        ]);
    }
}
