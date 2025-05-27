<?php

namespace App\Livewire\CMS\Product;

use App\Exports\ProductExport;
use App\Livewire\Component;
use App\Models\Product;
use App\Services\ProductCategoryService;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ProductPage extends Component
{
    #[Url(except: '')]
    public $product_category_id = '';

    #[Url(except: '')]
    public $search = '';

    #[Url(except: [])]
    public $is_active = [];

    public function resetFields(): void
    {
        $this->resetPage();

        $this->reset([
            'product_category_id',
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

        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.product').' '.trans('index.has_been_successfully_deleted'),
        ]);
    }

    public function getProducts(bool $paginate = true): object
    {
        $products = (new ProductService)->index(
            search: $this->search,
            productCategoryId: $this->product_category_id,
            isActive: $this->is_active,
            paginate: $paginate,
        );

        $products->loadMissing(['category']);

        return $products;
    }

    public function exportToExcel(): BinaryFileResponse
    {
        $this->alert('success', trans('index.export_to_excel').' '.trans('index.success'), [
            'html' => trans('index.product').' '.trans('index.has_been_successfully_exported'),
        ]);

        return Excel::download(new ProductExport(
            products: $this->getProducts(paginate: false),
        ), trans('index.product').'.xlsx');
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
        return view('livewire.cms.product.index', [
            'productCategories' => $this->getProductCategories(),
            'products' => $this->getProducts(),
        ]);
    }
}
