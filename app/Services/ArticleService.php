<?php

namespace App\Services;

use Andrisunardi\Library\Libraries\LivewireUpload;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleService
{
    public function index(
        ?string $search = '',
        ?string $date = '',
        array $isActive = [],
        bool $random = false,
        bool $trash = false,
        string $orderBy = 'id',
        string $sortBy = 'desc',
        int|string|null $limit = null,
        bool $first = false,
        bool $count = false,
        bool $paginate = true,
        int $perPage = 10,
    ): object {
        $articles = Article::query()
            ->when($search, fn ($q) => $q->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('name_id', 'LIKE', "%{$search}%")
                    ->orWhere('name_zh', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhere('description_id', 'LIKE', "%{$search}%")
                    ->orWhere('description_zh', 'LIKE', "%{$search}%")
                    ->orWhere('tags', 'LIKE', "%{$search}%")
                    ->orWhere('tags_id', 'LIKE', "%{$search}%")
                    ->orWhere('tags_zh', 'LIKE', "%{$search}%")
                    ->orWhere('date', 'LIKE', "%{$search}%")
                    ->orWhere('slug', 'LIKE', "%{$search}%");
            }))
            ->when($date, fn ($q) => $q->whereDate('date', $date))
            ->when($isActive, fn ($q) => $q->whereIn('is_active', $isActive))
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $articles->first();
        }

        if ($count) {
            return $articles->count();
        }

        if ($paginate) {
            return $articles->paginate($perPage);
        }

        return $articles->get();
    }

    public function create(array $data = []): Article
    {
        $slug = Str::slug($data['name']);

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'article',
            deleteAsset: false,
        );

        $data['slug'] = $slug;

        return Article::create($data);
    }

    public function update(Article $article, array $data = []): Article
    {
        $slug = Str::slug($data['name']);

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'article',
            checkAsset: $article->checkImage(),
            fileAsset: $article->image,
            deleteAsset: true,
        );

        $data['slug'] = $slug;

        $article->update($data);
        $article->refresh();

        return $article;
    }

    public function active(Article $article): Article
    {
        $article->is_active = ! $article->is_active;
        $article->save();
        $article->refresh();

        return $article;
    }

    public function deleteImage(Article $article)
    {
        $article->deleteImage();

        $article->image = null;
        $article->save();
        $article->refresh();

        return $article;
    }

    public function delete(Article $article): bool
    {
        return $article->delete();
    }

    public function deleteAll(array $articles = []): bool
    {
        return Article::when($articles, fn ($q) => $q->whereIn('id', $articles))->delete();
    }

    public function restore(Article $article): bool
    {
        return $article->restore();
    }

    public function restoreAll(array $articles = []): bool
    {
        return Article::when($articles, fn ($q) => $q->whereIn('id', $articles))->onlyTrashed()->restore();
    }

    public function deletePermanent(Article $article): bool
    {
        $article->deleteImage();

        return $article->forceDelete();
    }

    public function deletePermanentAll(array $articles = []): bool
    {
        $articles = Article::when($articles, fn ($q) => $q->whereIn('id', $articles))->onlyTrashed()->get();

        foreach ($articles as $article) {
            $article->deleteImage();
            $article->forceDelete();
        }

        return true;
    }
}
