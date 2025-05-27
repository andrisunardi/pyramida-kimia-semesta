<?php

namespace App\Livewire\CMS\ProductCategory;

use App\Exports\ProductCategoryExport;
use App\Livewire\Component;
use App\Models\ProductCategory;
use App\Services\ProductCategoryService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ProductCategoryPage extends Component
{
    #[Url(except: '')]
    public $search = '';

    #[Url(except: [])]
    public $is_active = [];

    public function resetFields(): void
    {
        $this->resetPage();

        $this->reset([
            'search',
            'is_active',
        ]);

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function updating(): void
    {
        $this->resetPage();
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

        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.product_category').' '.trans('index.has_been_successfully_deleted'),
        ]);
    }

    public function getProductCategories(bool $paginate = true): object
    {
        return (new ProductCategoryService)->index(
            search: $this->search,
            isActive: $this->is_active,
            paginate: $paginate,
        );
    }

    public function exportToExcel(): BinaryFileResponse
    {
        $this->alert('success', trans('index.export_to_excel').' '.trans('index.success'), [
            'html' => trans('index.product_category').' '.trans('index.has_been_successfully_exported'),
        ]);

        return Excel::download(new ProductCategoryExport(
            productCategories: $this->getProductCategories(paginate: false),
        ), trans('index.product_category').'.xlsx');
    }

    public function render(): View
    {
        return view('livewire.cms.product-category.index', [
            'productCategories' => $this->getProductCategories(),
        ]);
    }
}
