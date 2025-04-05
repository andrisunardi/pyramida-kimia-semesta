<?php

namespace App\Livewire\History;

use App\Livewire\Component;
use App\Services\HistoryService;
use Illuminate\Contracts\View\View;

class HistoryPage extends Component
{
    public function getHistories(): object
    {
        return (new HistoryService)->index(
            orderBy: 'year',
            sortBy: 'asc',
            isActive: [true],
            paginate: false,
        );
    }

    public function render(): View
    {
        return view('livewire.history.index', [
            'histories' => $this->getHistories(),
        ]);
    }
}
