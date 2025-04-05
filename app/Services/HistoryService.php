<?php

namespace App\Services;

use App\Models\History;

class HistoryService
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
        $histories = History::query()
            ->when($search, fn ($q) => $q->where(function ($query) use ($search) {
                $query->where('year', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhere('name_id', 'LIKE', "%{$search}%")
                    ->orWhere('name_zh', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhere('description_id', 'LIKE', "%{$search}%")
                    ->orWhere('description_zh', 'LIKE', "%{$search}%");
            }))
            ->when($isActive, fn ($q) => $q->whereIn('is_active', $isActive))
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $histories->first();
        }

        if ($count) {
            return $histories->count();
        }

        if ($paginate) {
            return $histories->paginate($perPage);
        }

        return $histories->get();
    }

    public function create(array $data = []): History
    {
        return History::create($data);
    }

    public function update(History $history, array $data = []): History
    {
        $history->update($data);
        $history->refresh();

        return $history;
    }

    public function active(History $history): History
    {
        $history->is_active = ! $history->is_active;
        $history->save();
        $history->refresh();

        return $history;
    }

    public function delete(History $history): bool
    {
        return $history->delete();
    }

    public function deleteAll(array $histories = []): bool
    {
        return History::when($histories, fn ($q) => $q->whereIn('id', $histories))->delete();
    }

    public function restore(History $history): bool
    {
        return $history->restore();
    }

    public function restoreAll(array $histories = []): bool
    {
        return History::when($histories, fn ($q) => $q->whereIn('id', $histories))->onlyTrashed()->restore();
    }

    public function deletePermanent(History $history): bool
    {
        return $history->forceDelete();
    }

    public function deletePermanentAll(array $histories = []): bool
    {
        $histories = History::when($histories, fn ($q) => $q->whereIn('id', $histories))->onlyTrashed()->get();

        foreach ($histories as $history) {
            $history->forceDelete();
        }

        return true;
    }
}
