<?php

namespace App\Services;

use App\Models\Career;

class CareerService
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
        $careers = Career::query()
            ->when($search, fn ($q) => $q->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('name_id', 'LIKE', "%{$search}%")
                    ->orWhere('name_zh', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhere('description_id', 'LIKE', "%{$search}%")
                    ->orWhere('description_zh', 'LIKE', "%{$search}%")
                    ->orWhere('location', 'LIKE', "%{$search}%")
                    ->orWhere('location_id', 'LIKE', "%{$search}%")
                    ->orWhere('location_zh', 'LIKE', "%{$search}%")
                    ->orWhere('link', 'LIKE', "%{$search}%");
            }))
            ->when($isActive, fn ($q) => $q->whereIn('is_active', $isActive))
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $careers->first();
        }

        if ($count) {
            return $careers->count();
        }

        if ($paginate) {
            return $careers->paginate($perPage);
        }

        return $careers->get();
    }

    public function create(array $data = []): Career
    {
        return Career::create($data);
    }

    public function update(Career $career, array $data = []): Career
    {
        $career->update($data);
        $career->refresh();

        return $career;
    }

    public function active(Career $career): Career
    {
        $career->is_active = ! $career->is_active;
        $career->save();
        $career->refresh();

        return $career;
    }

    public function delete(Career $career): bool
    {
        return $career->delete();
    }

    public function deleteAll(array $careers = []): bool
    {
        return Career::when($careers, fn ($q) => $q->whereIn('id', $careers))->delete();
    }

    public function restore(Career $career): bool
    {
        return $career->restore();
    }

    public function restoreAll(array $careers = []): bool
    {
        return Career::when($careers, fn ($q) => $q->whereIn('id', $careers))->onlyTrashed()->restore();
    }

    public function deletePermanent(Career $career): bool
    {
        return $career->forceDelete();
    }

    public function deletePermanentAll(array $careers = []): bool
    {
        $careers = Career::when($careers, fn ($q) => $q->whereIn('id', $careers))->onlyTrashed()->get();

        foreach ($careers as $career) {
            $career->forceDelete();
        }

        return true;
    }
}
