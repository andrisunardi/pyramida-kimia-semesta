<?php

namespace App\Services;

use Andrisunardi\Library\Libraries\LivewireUpload;
use App\Models\Office;
use Illuminate\Support\Str;

class OfficeService
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
        $offices = Office::query()
            ->when($search, fn ($q) => $q->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('address', 'LIKE', "%{$search}%")
                    ->orWhere('maps', 'LIKE', "%{$search}%")
                    ->orWhere('phone', 'LIKE', "%{$search}%");
            }))
            ->when($isActive, fn ($q) => $q->whereIn('is_active', $isActive))
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $offices->first();
        }

        if ($count) {
            return $offices->count();
        }

        if ($paginate) {
            return $offices->paginate($perPage);
        }

        return $offices->get();
    }

    public function create(array $data = []): Office
    {
        $slug = Str::slug($data['name']);

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'office',
            deleteAsset: false,
        );

        return Office::create($data);
    }

    public function update(Office $office, array $data = []): Office
    {
        $slug = Str::slug($data['name']);

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'office',
            checkAsset: $office->checkImage(),
            fileAsset: $office->image,
            deleteAsset: true,
        );

        $office->update($data);
        $office->refresh();

        return $office;
    }

    public function active(Office $office): Office
    {
        $office->is_active = ! $office->is_active;
        $office->save();
        $office->refresh();

        return $office;
    }

    public function deleteImage(Office $office)
    {
        $office->deleteImage();

        $office->image = null;
        $office->save();
        $office->refresh();

        return $office;
    }

    public function delete(Office $office): bool
    {
        return $office->delete();
    }

    public function deleteAll(array $offices = []): bool
    {
        return Office::when($offices, fn ($q) => $q->whereIn('id', $offices))->delete();
    }

    public function restore(Office $office): bool
    {
        return $office->restore();
    }

    public function restoreAll(array $offices = []): bool
    {
        return Office::when($offices, fn ($q) => $q->whereIn('id', $offices))->onlyTrashed()->restore();
    }

    public function deletePermanent(Office $office): bool
    {
        $office->deleteImage();

        return $office->forceDelete();
    }

    public function deletePermanentAll(array $offices = []): bool
    {
        $offices = Office::when($offices, fn ($q) => $q->whereIn('id', $offices))->onlyTrashed()->get();

        foreach ($offices as $office) {
            $office->deleteImage();
            $office->forceDelete();
        }

        return true;
    }
}
