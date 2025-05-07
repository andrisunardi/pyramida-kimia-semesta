<?php

namespace App\Livewire\CMS\Testimony;

use App\Livewire\Component;
use App\Models\Testimony;
use App\Services\TestimonyService;
use Illuminate\Contracts\View\View;

class TestimonyDetailPage extends Component
{
    public Testimony $testimony;

    public function mount(Testimony $testimony): void
    {
        $this->testimony = $testimony;
    }

    public function changeActive(Testimony $testimony): void
    {
        (new TestimonyService)->active(testimony: $testimony);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.testimony').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(Testimony $testimony): void
    {
        (new TestimonyService)->delete(testimony: $testimony);

        $this->flash('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.testimony').' '.trans('index.has_been_successfully_deleted'),
        ]);

        $this->redirect(route('cms.testimony.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.testimony.detail');
    }
}
