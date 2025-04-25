<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class OfficeExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $offices;

    public function __construct(object $offices)
    {
        $this->offices = $offices;
    }

    public function view(): View
    {
        return view('excel.office', [
            'offices' => $this->offices,
        ]);
    }
}
