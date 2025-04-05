<?php

namespace App\Livewire\Layouts;

use App\Livewire\Component;
use App\Services\ProductCategoryService;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;

class Footer extends Component
{
    public function getProductCategories(): object
    {
        return (new ProductCategoryService)->index(
            isActive: [true],
            orderBy: 'name',
            sortBy: 'asc',
            limit: 12,
            paginate: false,
            trash: false,
        );
    }

    public function getProducts(): object
    {
        return (new ProductService)->index(
            isActive: [true],
            random: true,
            orderBy: 'id',
            sortBy: 'desc',
            limit: 24,
            paginate: false,
            trash: false,
        );
    }

    public function render(): View
    {
        return view('livewire.layouts.footer', [
            'productCategories' => $this->getProductCategories(),
            'products' => $this->getProducts(),
        ]);
    }
}
