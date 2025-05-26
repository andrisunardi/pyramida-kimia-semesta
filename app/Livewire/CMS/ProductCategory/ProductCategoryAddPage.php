<?php

namespace App\Livewire\CMS\ProductCategory;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\ProductCategory\ProductCategoryAddForm;
use Illuminate\Contracts\View\View;

class ProductCategoryAddPage extends Component
{
    public ProductCategoryAddForm $form;

    public function resetFields(): void
    {
        $this->form->reset();

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit();

        $this->flash('success', trans('index.add').' '.trans('index.success'), [
            'html' => trans('index.product_category').' '.trans('index.has_been_successfully_added'),
        ]);

        $this->redirect(route('cms.product-category.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.product-category.add');
    }
}
