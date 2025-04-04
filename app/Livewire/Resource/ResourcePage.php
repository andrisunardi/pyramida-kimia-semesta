<?php

namespace App\Livewire\Resource;

use App\Livewire\Component;
use App\Services\ProductCategoryService;

class ResourcePage extends Component
{
    public function getProductCategories()
    {
        $productCategories = (new ProductCategoryService)->index(
            orderBy: 'name',
            sortBy: 'asc',
            isActive: [true],
            paginate: false,
        );

        $productCategories->loadMissing(['products']);

        return $productCategories;
    }

    public function render()
    {
        return view('livewire.resource.index', [
            'productCategories' => $this->getProductCategories(),
        ]);
    }
}
