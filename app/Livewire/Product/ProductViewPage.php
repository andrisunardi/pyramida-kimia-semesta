<?php

namespace App\Livewire\Product;

use App\Models\Product;
use App\Livewire\Component;
use App\Services\ProductService;

class ProductViewPage extends Component
{
    public ?Product $product;

    public function mount(string $slug): void
    {
        $this->product = Product::where('slug', $slug)->active()->first();

        if (! $this->product) {
            $this->flash('error', trans('index.product').' '.trans('index.not_found'), [
                'html' => trans('index.please_try_again_later'),
            ]);

            redirect()->route('product.index');

            return;
        }
    }

    public function getOtherProducts(): object
    {
        $otherProducts =  (new ProductService)->index(
            productCategoryId: $this->product->product_category_id,
            isActive: [true],
            random: true,
            limit: 2,
            paginate: false,
        )->reject(fn ($product) => $product->id == $this->product->id);

        $otherProducts->loadMissing(['category']);

        return $otherProducts;
    }

    public function render()
    {
        return view('livewire.product.view', [
            'otherProducts' => $this->getOtherProducts(),
        ]);
    }
}
