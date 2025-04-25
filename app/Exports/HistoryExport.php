<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class HistoryExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $histories;

    public function __construct(object $histories)
    {
        $this->histories = $histories;
    }

    public function view(): View
    {
        return view('excel.history', [
            'histories' => $this->histories,
        ]);
    }
}
