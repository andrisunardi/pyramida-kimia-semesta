<?php

namespace App\Livewire\Article;

use App\Livewire\Component;
use App\Services\ArticleService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;

class ArticleSidebarRightComponent extends Component
{
    #[Url(except: '')]
    public string $search = '';

    public function updatedSearch(string $search): void
    {
        $this->search = $search;
        $this->dispatch('searchChanged', search: $search);
    }

    public function getArticles(): object
    {
        return (new ArticleService)->index(
            search: $this->search,
            isActive: [true],
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function getRecentArticles(): object
    {
        return (new ArticleService)->index(
            isActive: [true],
            limit: 5,
        );
    }

    public function getTags(): object
    {
        return (new ArticleService)->index(
            isActive: [true],
            paginate: false,
        )->pluck('tags')->collapse();
    }

    public function getIdTags(): object
    {
        return (new ArticleService)->index(
            isActive: [true],
            paginate: false,
        )->pluck('tags_id')->collapse();
    }

    public function getZhTags(): object
    {
        return (new ArticleService)->index(
            isActive: [true],
            paginate: false,
        )->pluck('tags_zh')->collapse();
    }

    public function submit(): void
    {
        $this->getArticles();
    }

    public function render(): View
    {
        return view('livewire.article.sidebar-right', [
            'articles' => $this->getArticles(),
            'recentArticles' => $this->getRecentArticles(),
            'tags' => $this->getTags(),
            'idTags' => $this->getIdTags(),
            'zhTags' => $this->getZhTags(),
        ]);
    }
}
