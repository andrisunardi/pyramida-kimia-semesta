<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TestimonyExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $testimonies;

    public function __construct(object $testimonies)
    {
        $this->testimonies = $testimonies;
    }

    public function view(): View
    {
        return view('excel.testimony', [
            'testimonies' => $this->testimonies,
        ]);
    }
}
