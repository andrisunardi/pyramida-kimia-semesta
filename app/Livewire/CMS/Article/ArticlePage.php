<?php

namespace App\Livewire\CMS\Article;

use App\Exports\ArticleExport;
use App\Livewire\Component;
use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ArticlePage extends Component
{
    #[Url(except: '')]
    public $search = '';

    #[Url(except: [])]
    public $is_active = [];

    public function resetFields(): void
    {
        $this->resetPage();

        $this->reset([
            'search',
            'is_active',
        ]);

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function updating(): void
    {
        $this->resetPage();
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

        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.article').' '.trans('index.has_been_successfully_deleted'),
        ]);
    }

    public function getArticles(bool $paginate = true): object
    {
        return (new ArticleService)->index(
            search: $this->search,
            isActive: $this->is_active,
            paginate: $paginate,
        );
    }

    public function exportToExcel(): BinaryFileResponse
    {
        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.article').' '.trans('index.has_been_successfully_exported'),
        ]);

        return Excel::download(new ArticleExport(
            articles: $this->getArticles(paginate: false),
        ), trans('index.article').'.xlsx');
    }

    public function render(): View
    {
        return view('livewire.cms.article.index', [
            'articles' => $this->getArticles(),
        ]);
    }
}
