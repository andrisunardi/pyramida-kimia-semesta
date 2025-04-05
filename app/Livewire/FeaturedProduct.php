<?php

namespace App\Livewire;

use App\Services\ProductService;
use Illuminate\Contracts\View\View;

class FeaturedProduct extends Component
{
    public function getProduct(): object
    {
        return (new ProductService)->index(
            isActive: [true],
            random: true,
            first: true,
        );
    }

    public function render(): View
    {
        return view('livewire.featured-product', [
            'product' => $this->getProduct(),
        ]);
    }
}
