<?php

namespace App\Livewire\Layouts;

use App\Livewire\Component;
use App\Services\ProductCategoryService;

class Header extends Component
{
    public function getProductCategories()
    {
        $productCategories = (new ProductCategoryService)->index(
            isActive: [true],
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
            trash: false,
        );

        $productCategories->loadMissing(['products']);

        return $productCategories;
    }

    public function render()
    {
        return view('livewire.layouts.header', [
            'productCategories' => $this->getProductCategories(),
        ]);
    }
}
