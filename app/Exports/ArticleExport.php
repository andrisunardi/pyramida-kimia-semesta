<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ArticleExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $articles;

    public function __construct(object $articles)
    {
        $this->articles = $articles;
    }

    public function view(): View
    {
        return view('excel.article', [
            'articles' => $this->articles,
        ]);
    }
}
