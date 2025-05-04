<?php

namespace App\Livewire\CMS\Faq;

use App\Livewire\Component;
use App\Models\Faq;
use App\Services\FaqService;
use Illuminate\Contracts\View\View;

class FaqDetailPage extends Component
{
    public Faq $faq;

    public function mount(Faq $faq): void
    {
        $this->faq = $faq;
    }

    public function changeActive(Faq $faq): void
    {
        (new FaqService)->active(faq: $faq);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.faq').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(Faq $faq): void
    {
        (new FaqService)->delete(faq: $faq);

        $this->flash('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.faq').' '.trans('index.has_been_successfully_deleted'),
        ]);

        $this->redirect(route('cms.faq.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.faq.detail');
    }
}
