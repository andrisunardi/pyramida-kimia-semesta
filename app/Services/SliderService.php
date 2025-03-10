<?php

namespace App\Services;

use Andrisunardi\Library\Libraries\LivewireUpload;
use App\Models\Gallery;

class GalleryService
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
        $galleries = Gallery::query()
            ->when($search, fn ($q) => $q->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
            }))
            ->when($isActive, fn ($q) => $q->whereIn('is_active', $isActive))
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $galleries->first();
        }

        if ($count) {
            return $galleries->count();
        }

        if ($paginate) {
            return $galleries->paginate($perPage);
        }

        return $galleries->get();
    }

    public function create(array $data = []): Gallery
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'gallery',
            deleteAsset: false,
        );

        return Gallery::create($data);
    }

    public function update(Gallery $gallery, array $data = []): Gallery
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'gallery',
            checkAsset: $gallery->checkImage(),
            fileAsset: $gallery->image,
            deleteAsset: true,
        );

        $gallery->update($data);
        $gallery->refresh();

        return $gallery;
    }

    public function active(Gallery $gallery): Gallery
    {
        $gallery->is_active = ! $gallery->is_active;
        $gallery->save();
        $gallery->refresh();

        return $gallery;
    }

    public function delete(Gallery $gallery): bool
    {
        return $gallery->delete();
    }
}
