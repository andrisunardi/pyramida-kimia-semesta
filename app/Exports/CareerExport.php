<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CareerExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $careers;

    public function __construct(object $careers)
    {
        $this->careers = $careers;
    }

    public function view(): View
    {
        return view('excel.career', [
            'careers' => $this->careers,
        ]);
    }
}
