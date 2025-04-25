<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TeamExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $teams;

    public function __construct(object $teams)
    {
        $this->teams = $teams;
    }

    public function view(): View
    {
        return view('excel.team', [
            'teams' => $this->teams,
        ]);
    }
}
