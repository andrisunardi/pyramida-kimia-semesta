<?php

namespace App\Livewire\Product;

use App\Livewire\Component;
use App\Models\Product;

class ProductViewPage extends Component
{
    public Product $product;

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

    public function render()
    {
        return view('livewire.product.view');
    }
}
