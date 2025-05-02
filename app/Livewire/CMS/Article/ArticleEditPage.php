<?php

namespace App\Livewire\CMS\Article;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Article\ArticleEditForm;
use App\Models\Article;

class ArticleEditPage extends Component
{
    public ArticleEditForm $form;

    public Article $article;

    public function mount(Article $article): void
    {
        $this->article = $article;
        $this->form->set(article: $article);
    }

    public function resetFields(): void
    {
        $this->form->set(article: $this->article);

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit(article: $this->article);

        $this->flash('success', trans('index.edit').' '.trans('index.success'), [
            'html' => trans('index.article').' '.trans('index.has_been_successfully_edited'),
        ]);

        $this->redirect(route('cms.article.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.cms.article.edit');
    }
}
