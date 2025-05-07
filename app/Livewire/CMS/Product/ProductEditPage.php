<?php

namespace App\Livewire\CMS\Product;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Product\ProductEditForm;
use App\Models\Product;
use App\Services\ProductCategoryService;

class ProductEditPage extends Component
{
    public ProductEditForm $form;

    public Product $product;

    public function mount(Product $product): void
    {
        $this->product = $product;
        $this->form->set(product: $product);
    }

    public function resetFields(): void
    {
        $this->form->set(product: $this->product);

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit(product: $this->product);

        $this->flash('success', trans('index.edit').' '.trans('index.success'), [
            'html' => trans('index.product').' '.trans('index.has_been_successfully_edited'),
        ]);

        $this->redirect(route('cms.product.index'), navigate: true);
    }

    public function getProductCategories(): object
    {
        return (new ProductCategoryService)->index(
            isActive: [true],
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function render()
    {
        return view('livewire.cms.product.edit', [
            'productCategories' => $this->getProductCategories(),
        ]);
    }
}
