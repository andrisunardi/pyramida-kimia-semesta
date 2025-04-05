<?php

namespace App\Livewire\Resource;

use App\Livewire\Component;
use App\Services\ProductCategoryService;
use Illuminate\Contracts\View\View;

class ResourcePage extends Component
{
    public function getProductCategories(): object
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

    public function render(): View
    {
        return view('livewire.resource.index', [
            'productCategories' => $this->getProductCategories(),
        ]);
    }
}
