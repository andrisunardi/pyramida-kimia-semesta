<?php

namespace App\Livewire\Article;

use App\Livewire\Component;
use App\Services\ArticleService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

class ArticlePage extends Component
{
    #[Url(except: '')]
    public string $search = '';

    #[On('searchChanged')]
    public function handleSearchChanged(string $search)
    {
        $this->search = $search;
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

    public function render(): View
    {
        return view('livewire.article.index', [
            'articles' => $this->getArticles(),
        ]);
    }
}
