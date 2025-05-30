<?php

namespace App\Services;

use App\Models\Testimony;

class TestimonyService
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
        $testimonies = Testimony::query()
            ->when($search, fn ($q) => $q->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('company', 'LIKE', "%{$search}%")
                    ->orWhere('message', 'LIKE', "%{$search}%")
                    ->orWhere('message_id', 'LIKE', "%{$search}%")
                    ->orWhere('message_zh', 'LIKE', "%{$search}%");
            }))
            ->when($isActive, fn ($q) => $q->whereIn('is_active', $isActive))
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $testimonies->first();
        }

        if ($count) {
            return $testimonies->count();
        }

        if ($paginate) {
            return $testimonies->paginate($perPage);
        }

        return $testimonies->get();
    }

    public function create(array $data = []): Testimony
    {
        return Testimony::create($data);
    }

    public function update(Testimony $testimony, array $data = []): Testimony
    {
        $testimony->update($data);
        $testimony->refresh();

        return $testimony;
    }

    public function active(Testimony $testimony): Testimony
    {
        $testimony->is_active = ! $testimony->is_active;
        $testimony->save();
        $testimony->refresh();

        return $testimony;
    }

    public function delete(Testimony $testimony): bool
    {
        return $testimony->delete();
    }
}
