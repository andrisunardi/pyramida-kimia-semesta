<?php

namespace App\Observers;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleObserver
{
    public function creating(Article $article)
    {
        $article->created_by = Auth::user()->id ?? null;
    }

    public function created(Article $article)
    {
        $article->created_by = Auth::user()->id ?? null;
    }

    public function updating(Article $article)
    {
        $article->updated_by = Auth::user()->id ?? null;
    }

    public function updated(Article $article)
    {
        $article->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(Article $article)
    {
        $article->deleted_by = Auth::user()->id ?? null;
        $article->save();
    }

    public function deleted(Article $article)
    {
        $article->deleted_by = Auth::user()->id ?? null;
        $article->save();
    }

    public function restoring(Article $article)
    {
        $article->deleted_by = null;
        $article->save();
    }

    public function restored(Article $article)
    {
        $article->deleted_by = null;
        $article->save();
    }

    public function forceDeleted(Article $article) {}
}
