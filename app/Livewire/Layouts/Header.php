<?php

namespace App\Livewire\Layouts;

use App\Livewire\Component;
use App\Services\ProductCategoryService;
use Illuminate\Contracts\View\View;

class Header extends Component
{
    public function getProductCategories(): object
    {
        $productCategories = (new ProductCategoryService)->index(
            isActive: [true],
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );

        $productCategories->loadMissing(['products']);

        return $productCategories;
    }

    public function render(): View
    {
        return view('livewire.layouts.header', [
            'productCategories' => $this->getProductCategories(),
        ]);
    }
}
