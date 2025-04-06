<?php

namespace App\Services;

use Andrisunardi\Library\Libraries\LivewireUpload;
use App\Models\Partner;

class PartnerService
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
        $partners = Partner::query()
            ->when($search, fn ($q) => $q->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('name_id', 'LIKE', "%{$search}%")
                    ->orWhere('name_zh', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhere('description_id', 'LIKE', "%{$search}%")
                    ->orWhere('description_zh', 'LIKE', "%{$search}%")
                    ->orWhere('link', 'LIKE', "%{$search}%");
            }))
            ->when($isActive, fn ($q) => $q->whereIn('is_active', $isActive))
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $partners->first();
        }

        if ($count) {
            return $partners->count();
        }

        if ($paginate) {
            return $partners->paginate($perPage);
        }

        return $partners->get();
    }

    public function create(array $data = []): Partner
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'partner',
            deleteAsset: false,
        );

        return Partner::create($data);
    }

    public function update(Partner $partner, array $data = []): Partner
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'partner',
            checkAsset: $partner->checkImage(),
            fileAsset: $partner->image,
            deleteAsset: true,
        );

        $partner->update($data);
        $partner->refresh();

        return $partner;
    }

    public function active(Partner $partner): Partner
    {
        $partner->is_active = ! $partner->is_active;
        $partner->save();
        $partner->refresh();

        return $partner;
    }

    public function deleteImage(Partner $partner)
    {
        $partner->deleteImage();

        $partner->image = null;
        $partner->save();
        $partner->refresh();

        return $partner;
    }

    public function delete(Partner $partner): bool
    {
        return $partner->delete();
    }

    public function deleteAll(array $partners = []): bool
    {
        return Partner::when($partners, fn ($q) => $q->whereIn('id', $partners))->delete();
    }

    public function restore(Partner $partner): bool
    {
        return $partner->restore();
    }

    public function restoreAll(array $partners = []): bool
    {
        return Partner::when($partners, fn ($q) => $q->whereIn('id', $partners))->onlyTrashed()->restore();
    }

    public function deletePermanent(Partner $partner): bool
    {
        $partner->deleteImage();

        return $partner->forceDelete();
    }

    public function deletePermanentAll(array $partners = []): bool
    {
        $partners = Partner::when($partners, fn ($q) => $q->whereIn('id', $partners))->onlyTrashed()->get();

        foreach ($partners as $partner) {
            $partner->deleteImage();
            $partner->forceDelete();
        }

        return true;
    }
}
