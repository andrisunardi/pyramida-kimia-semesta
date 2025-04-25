<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class GalleryCategoryExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $galleryCategories;

    public function __construct(object $galleryCategories)
    {
        $this->galleryCategories = $galleryCategories;
    }

    public function view(): View
    {
        return view('excel.gallery-category', [
            'galleryCategories' => $this->galleryCategories,
        ]);
    }
}
