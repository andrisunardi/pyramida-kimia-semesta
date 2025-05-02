<?php

namespace App\Livewire\CMS\Article;

use App\Livewire\Component;
use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Contracts\View\View;

class ArticleDetailPage extends Component
{
    public Article $article;

    public function mount(Article $article): void
    {
        $this->article = $article;
    }

    public function changeActive(Article $article): void
    {
        (new ArticleService)->active(article: $article);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.article').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(Article $article): void
    {
        (new ArticleService)->delete(article: $article);

        $this->flash('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.article').' '.trans('index.has_been_successfully_deleted'),
        ]);

        $this->redirect(route('cms.article.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.article.detail');
    }
}
