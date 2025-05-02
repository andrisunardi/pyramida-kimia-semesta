<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CareerBenefitExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $careerBenefits;

    public function __construct(object $careerBenefits)
    {
        $this->careerBenefits = $careerBenefits;
    }

    public function view(): View
    {
        return view('excel.career-benefit', [
            'careerBenefits' => $this->careerBenefits,
        ]);
    }
}
