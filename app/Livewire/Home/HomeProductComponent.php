<?php

namespace App\Livewire\Home;

use App\Livewire\Component;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;

class HomeProductComponent extends Component
{
    public function getProducts(): object
    {
        $products = (new ProductService)->index(
            isActive: [true],
            random: true,
            limit: 12,
            paginate: false,
        );

        return $products;
    }

    public function render(): View
    {
        return view('livewire.home.product', [
            'products' => $this->getProducts(),
        ]);
    }
}
