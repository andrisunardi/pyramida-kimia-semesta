<?php

namespace App\Livewire\CMS\Office;

use App\Livewire\Component;
use App\Models\Office;
use App\Services\OfficeService;
use Illuminate\Contracts\View\View;

class OfficeDetailPage extends Component
{
    public Office $office;

    public function mount(Office $office): void
    {
        $this->office = $office;
    }

    public function changeActive(Office $office): void
    {
        (new OfficeService)->active(office: $office);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.office').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(Office $office): void
    {
        (new OfficeService)->delete(office: $office);

        $this->flash('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.office').' '.trans('index.has_been_successfully_deleted'),
        ]);

        $this->redirect(route('cms.office.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.office.detail');
    }
}
