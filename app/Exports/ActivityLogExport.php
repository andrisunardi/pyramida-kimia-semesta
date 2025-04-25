<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ActivityLogExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $activityLogs;

    public function __construct(object $activityLogs)
    {
        $this->activityLogs = $activityLogs;
    }

    public function view(): View
    {
        return view('excel.activty-log', [
            'activityLogs' => $this->activityLogs,
        ]);
    }
}
