<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class EventExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $events;

    public function __construct(object $events)
    {
        $this->events = $events;
    }

    public function view(): View
    {
        return view('excel.event', [
            'events' => $this->events,
        ]);
    }
}
