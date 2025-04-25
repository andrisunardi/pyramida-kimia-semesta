<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class GalleryExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $galleries;

    public function __construct(object $galleries)
    {
        $this->galleries = $galleries;
    }

    public function view(): View
    {
        return view('excel.gallery', [
            'galleries' => $this->galleries,
        ]);
    }
}
