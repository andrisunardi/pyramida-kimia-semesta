<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductCategoryExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $productCategories;

    public function __construct(object $productCategories)
    {
        $this->productCategories = $productCategories;
    }

    public function view(): View
    {
        return view('excel.product-category', [
            'productCategories' => $this->productCategories,
        ]);
    }
}
