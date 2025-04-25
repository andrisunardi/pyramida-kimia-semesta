<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PartnerExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $partners;

    public function __construct(object $partners)
    {
        $this->partners = $partners;
    }

    public function view(): View
    {
        return view('excel.partner', [
            'partners' => $this->partners,
        ]);
    }
}
