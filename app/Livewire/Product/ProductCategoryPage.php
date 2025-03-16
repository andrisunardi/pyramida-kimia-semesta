<?php

namespace App\Livewire\Product;

use App\Livewire\Component;
use App\Models\ProductCategory;

class ProductCategoryPage extends Component
{
    public ProductCategory $productCategory;

    public function mount(string $slug): void
    {
        $this->productCategory = ProductCategory::where('slug', $slug)->active()->first();

        if (! $this->productCategory) {
            $this->flash('error', trans('index.product_category').' '.trans('index.not_found'), [
                'html' => trans('index.please_try_again_later'),
            ]);

            redirect()->route('product.index');

            return;
        }
    }

    public function render()
    {
        return view('livewire.product.category');
    }
}
