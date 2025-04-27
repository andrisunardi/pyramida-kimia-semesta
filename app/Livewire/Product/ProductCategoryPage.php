<?php

namespace App\Livewire\Product;

use App\Livewire\Component;
use App\Models\ProductCategory;
use Illuminate\Contracts\View\View;

class ProductCategoryPage extends Component
{
    public ?ProductCategory $productCategory;

    public function mount(string $slug): void
    {
        $this->productCategory = ProductCategory::where('slug', $slug)->active()->first();

        if (! $this->productCategory) {
            $this->flash('error', trans('index.product_category').' '.trans('index.not_found'), [
                'html' => trans('index.please_try_again_later'),
            ]);

            $this->redirect(route('product.index'), navigate: true);
        }
    }

    public function render(): View
    {
        return view('livewire.product.category');
    }
}
