<?php

namespace App\Livewire\CMS\Article;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Article\ArticleAddForm;
use Illuminate\Contracts\View\View;

class ArticleAddPage extends Component
{
    public ArticleAddForm $form;

    public function mount(): void
    {
        $this->form->set();
    }

    public function resetFields(): void
    {
        $this->form->reset();
        $this->form->set();

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit();

        $this->flash('success', trans('index.add').' '.trans('index.success'), [
            'html' => trans('index.article').' '.trans('index.has_been_successfully_added'),
        ]);

        $this->redirect(route('cms.article.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.article.add');
    }
}
