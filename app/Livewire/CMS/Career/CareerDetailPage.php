<?php

namespace App\Livewire\CMS\Career;

use App\Livewire\Component;
use App\Models\Career;
use App\Services\CareerService;
use Illuminate\Contracts\View\View;

class CareerDetailPage extends Component
{
    public Career $career;

    public function mount(Career $career): void
    {
        $this->career = $career;
    }

    public function changeActive(Career $career): void
    {
        (new CareerService)->active(career: $career);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.career').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(Career $career): void
    {
        (new CareerService)->delete(career: $career);

        $this->flash('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.career').' '.trans('index.has_been_successfully_deleted'),
        ]);

        $this->redirect(route('cms.career.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.career.detail');
    }
}
