<?php

namespace App\Livewire\Article;

use App\Livewire\Component;
use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Contracts\View\View;

class ArticleViewPage extends Component
{
    public ?Article $article;

    public function mount(string $slug): void
    {
        $this->article = Article::where('slug', $slug)->active()->first();

        if (! $this->article) {
            $this->flash('error', trans('index.article').' '.trans('index.not_found'), [
                'html' => trans('index.please_try_again_later'),
            ]);

            redirect()->route('article.index');

            return;
        }
    }

    public function getOtherArticles(): object
    {
        return (new ArticleService)->index(
            isActive: [true],
            random: true,
            limit: 3,
            paginate: false,
        )->reject(fn ($article) => $article->id == $this->article->id);
    }

    public function render(): View
    {
        return view('livewire.article.view', [
            'otherArticles' => $this->getOtherArticles(),
        ]);
    }
}
