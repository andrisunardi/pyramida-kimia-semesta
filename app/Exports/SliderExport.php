<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SliderExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $sliders;

    public function __construct(object $sliders)
    {
        $this->sliders = $sliders;
    }

    public function view(): View
    {
        return view('excel.slider', [
            'sliders' => $this->sliders,
        ]);
    }
}
