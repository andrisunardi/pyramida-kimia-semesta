<?php

namespace App\Livewire\Product;

use App\Livewire\Component;
use App\Services\ProductCategoryService;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;

class ProductPage extends Component
{
    public function getProductCategories(): object
    {
        $productCategories = (new ProductCategoryService)->index(
            isActive: [true],
            orderBy: 'id',
            sortBy: 'asc',
            paginate: false,
        );

        $productCategories->loadMissing(['products']);
        $productCategories->loadCount(['products']);

        return $productCategories;
    }

    public function getProducts(): object
    {
        $products = (new ProductService)->index(
            isActive: [true],
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );

        $products->loadMissing(['category']);

        return $products;
    }

    public function render(): View
    {
        return view('livewire.product.index', [
            'productCategories' => $this->getProductCategories(),
            'products' => $this->getProducts(),
        ]);
    }
}
