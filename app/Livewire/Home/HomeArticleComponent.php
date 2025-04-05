<?php

namespace App\Livewire\Home;

use App\Livewire\Component;
use App\Services\ArticleService;
use Illuminate\Contracts\View\View;

class HomeArticleComponent extends Component
{
    public function getArticles(): object
    {
        return (new ArticleService)->index(
            isActive: [true],
            limit: 3,
            paginate: false,
        );
    }

    public function render(): View
    {
        return view('livewire.home.article', [
            'articles' => $this->getArticles(),
        ]);
    }
}
