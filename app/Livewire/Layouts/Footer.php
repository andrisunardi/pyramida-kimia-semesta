<?php

namespace App\Livewire\Layouts;

use App\Livewire\Component;
use App\Services\ProductCategoryService;

class Footer extends Component
{
    public function getProductCategories()
    {
        return (new ProductCategoryService)->index(
            isActive: [true],
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
            trash: false,
        );
    }

    public function getProducts()
    {
        return (new ProductCategoryService)->index(
            isActive: [true],
            random: true,
            orderBy: 'id',
            sortBy: 'desc',
            paginate: false,
            trash: false,
        );
    }

    public function render()
    {
        return view('livewire.layouts.footer', [
            'productCategories' => $this->getProductCategories(),
            'products' => $this->getProducts(),
        ]);
    }
}
