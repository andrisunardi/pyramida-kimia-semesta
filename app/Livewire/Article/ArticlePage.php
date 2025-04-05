<?php

namespace App\Livewire\Article;

use App\Livewire\Component;
use App\Services\ArticleService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;

class ArticlePage extends Component
{
    #[Url(except: '')]
    public string $search = '';

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

    public function submit(): void
    {
        $this->getArticles();
    }

    public function render(): View
    {
        return view('livewire.article.index', [
            'articles' => $this->getArticles(),
        ]);
    }
}
