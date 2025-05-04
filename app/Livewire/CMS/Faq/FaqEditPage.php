<?php

namespace App\Livewire\CMS\Faq;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Faq\FaqEditForm;
use App\Models\Faq;

class FaqEditPage extends Component
{
    public FaqEditForm $form;

    public Faq $faq;

    public function mount(Faq $faq): void
    {
        $this->faq = $faq;
        $this->form->set(faq: $faq);
    }

    public function resetFields(): void
    {
        $this->form->set(faq: $this->faq);

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit(faq: $this->faq);

        $this->flash('success', trans('index.edit').' '.trans('index.success'), [
            'html' => trans('index.faq').' '.trans('index.has_been_successfully_edited'),
        ]);

        $this->redirect(route('cms.faq.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.cms.faq.edit');
    }
}
