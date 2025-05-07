<?php

namespace App\Livewire\CMS\Product;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Product\ProductAddForm;
use App\Services\ProductCategoryService;
use Illuminate\Contracts\View\View;

class ProductAddPage extends Component
{
    public ProductAddForm $form;

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
            'html' => trans('index.product').' '.trans('index.has_been_successfully_added'),
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

    public function render(): View
    {
        return view('livewire.cms.product.add', [
            'productCategories' => $this->getProductCategories(),
        ]);
    }
}
