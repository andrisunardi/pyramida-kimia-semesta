<?php

namespace App\Livewire\Product;

use App\Livewire\Component;
use App\Services\ProductCategoryService;
use App\Services\ProductService;

class ProductPage extends Component
{
    public function getProductCategories()
    {
        $productCategories = (new ProductCategoryService)->index(
            isActive: [true],
            orderBy: 'id',
            sortBy: 'asc',
            paginate: false,
        );

        $productCategories->loadCount(['products']);

        return $productCategories;
    }

    public function getProducts()
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

    public function render()
    {
        return view('livewire.product.index', [
            'productCategories' => $this->getProductCategories(),
            'products' => $this->getProducts(),
        ]);
    }
}
