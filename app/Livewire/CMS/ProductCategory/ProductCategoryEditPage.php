<?php

namespace App\Livewire\CMS\ProductCategory;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\ProductCategory\ProductCategoryEditForm;
use App\Models\ProductCategory;

class ProductCategoryEditPage extends Component
{
    public ProductCategoryEditForm $form;

    public ProductCategory $productCategory;

    public function mount(ProductCategory $productCategory): void
    {
        $this->productCategory = $productCategory;
        $this->form->set(productCategory: $productCategory);
    }

    public function resetFields(): void
    {
        $this->form->set(productCategory: $this->productCategory);

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit(productCategory: $this->productCategory);

        $this->flash('success', trans('index.edit').' '.trans('index.success'), [
            'html' => trans('index.product_category').' '.trans('index.has_been_successfully_edited'),
        ]);

        $this->redirect(route('cms.product-category.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.cms.product-category.edit');
    }
}
