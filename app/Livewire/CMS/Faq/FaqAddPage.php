<?php

namespace App\Livewire\CMS\Faq;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Faq\FaqAddForm;
use Illuminate\Contracts\View\View;

class FaqAddPage extends Component
{
    public FaqAddForm $form;

    public function resetFields(): void
    {
        $this->form->reset();

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit();

        $this->flash('success', trans('index.add').' '.trans('index.success'), [
            'html' => trans('index.faq').' '.trans('index.has_been_successfully_added'),
        ]);

        $this->redirect(route('cms.faq.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.faq.add');
    }
}
