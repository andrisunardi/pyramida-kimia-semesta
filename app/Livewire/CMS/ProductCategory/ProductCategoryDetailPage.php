<?php

namespace App\Livewire\CMS\ProductCategory;

use App\Livewire\Component;
use App\Models\ProductCategory;
use App\Services\ProductCategoryService;
use Illuminate\Contracts\View\View;

class ProductCategoryDetailPage extends Component
{
    public ProductCategory $productCategory;

    public function mount(ProductCategory $productCategory): void
    {
        $this->productCategory = $productCategory;
    }

    public function changeActive(ProductCategory $productCategory): void
    {
        (new ProductCategoryService)->active(productCategory: $productCategory);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.product_category').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(ProductCategory $productCategory): void
    {
        (new ProductCategoryService)->delete(productCategory: $productCategory);

        $this->flash('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.product_category').' '.trans('index.has_been_successfully_deleted'),
        ]);

        $this->redirect(route('cms.product-category.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.product-category.detail');
    }
}
