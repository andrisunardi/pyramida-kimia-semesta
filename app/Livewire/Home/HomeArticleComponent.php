<?php

namespace App\Livewire\Home;

use App\Livewire\Component;
use App\Services\ArticleService;

class HomeArticleComponent extends Component
{
    public function getArticles()
    {
        return (new ArticleService)->index(
            isActive: [true],
            limit: 3,
            paginate: false,
        );
    }

    public function render()
    {
        return view('livewire.home.article', [
            'articles' => $this->getArticles(),
        ]);
    }
}
