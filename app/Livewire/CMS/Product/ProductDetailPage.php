<?php

namespace App\Livewire\CMS\Product;

use App\Livewire\Component;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;

class ProductDetailPage extends Component
{
    public Product $product;

    public function mount(Product $product): void
    {
        $this->product = $product;
    }

    public function changeActive(Product $product): void
    {
        (new ProductService)->active(product: $product);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.product').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(Product $product): void
    {
        (new ProductService)->delete(product: $product);

        $this->flash('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.product').' '.trans('index.has_been_successfully_deleted'),
        ]);

        $this->redirect(route('cms.product.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.product.detail');
    }
}
