<?php

namespace App\Livewire\Home;

use App\Livewire\Component;
use App\Services\ProductCategoryService;
use Illuminate\Contracts\View\View;

class HomeProductCategoryComponent extends Component
{
    public function getProductCategories(): object
    {
        $productCategories = (new ProductCategoryService)->index(
            isActive: [true],
            random: true,
            limit: 6,
            paginate: false,
        );

        $productCategories->loadCount(['products']);

        return $productCategories;
    }

    public function render(): View
    {
        return view('livewire.home.product-category', [
            'productCategories' => $this->getProductCategories(),
        ]);
    }
}
