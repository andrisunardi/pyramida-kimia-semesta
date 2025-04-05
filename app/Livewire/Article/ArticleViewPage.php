<?php

namespace App\Livewire\Article;

use App\Livewire\Component;
use Illuminate\Contracts\View\View;

class ArticleViewPage extends Component
{
    public function render(): View
    {
        return view('livewire.article.view');
    }
}
