<?php

namespace App\Livewire\CMS\History;

use App\Livewire\Component;
use App\Models\History;
use App\Services\HistoryService;
use Illuminate\Contracts\View\View;

class HistoryDetailPage extends Component
{
    public History $history;

    public function mount(History $history): void
    {
        $this->history = $history;
    }

    public function changeActive(History $history): void
    {
        (new HistoryService)->active(history: $history);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.history').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(History $history): void
    {
        (new HistoryService)->delete(history: $history);

        $this->flash('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.history').' '.trans('index.has_been_successfully_deleted'),
        ]);

        $this->redirect(route('cms.history.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.history.detail');
    }
}
