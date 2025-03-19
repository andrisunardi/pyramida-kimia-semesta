<?php

namespace App\Livewire;

use App\Services\ProductService;

class FeaturedProduct extends Component
{
    public function getProduct()
    {
        return (new ProductService)->index(
            isActive: [true],
            random: true,
            first: true,
        );
    }

    public function render()
    {
        return view('livewire.featured-product', [
            'product' => $this->getProduct(),
        ]);
    }
}
