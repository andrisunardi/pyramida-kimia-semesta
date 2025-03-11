<?php

namespace App\Services;

use App\Models\GalleryCategory;

class GalleryCategoryService
{
    public function index(
        ?string $search = '',
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
        $galleryCategories = GalleryCategory::query()
            ->when($search, fn ($q) => $q->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%");
            }))
            ->when($isActive, fn ($q) => $q->whereIn('is_active', $isActive))
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $galleryCategories->first();
        }

        if ($count) {
            return $galleryCategories->count();
        }

        if ($paginate) {
            return $galleryCategories->paginate($perPage);
        }

        return $galleryCategories->get();
    }

    public function create(array $data = []): GalleryCategory
    {
        return GalleryCategory::create($data);
    }

    public function update(GalleryCategory $galleryCategory, array $data = []): GalleryCategory
    {
        $galleryCategory->update($data);
        $galleryCategory->refresh();

        return $galleryCategory;
    }

    public function active(GalleryCategory $galleryCategory): GalleryCategory
    {
        $galleryCategory->is_active = ! $galleryCategory->is_active;
        $galleryCategory->save();
        $galleryCategory->refresh();

        return $galleryCategory;
    }

    public function delete(GalleryCategory $galleryCategory): bool
    {
        return $galleryCategory->delete();
    }
}
