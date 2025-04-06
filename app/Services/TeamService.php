<?php

namespace App\Services;

use Andrisunardi\Library\Libraries\LivewireUpload;
use App\Models\Team;

class TeamService
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
        $teams = Team::query()
            ->when($search, fn ($q) => $q->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('job', 'LIKE', "%{$search}%")
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
            return $teams->first();
        }

        if ($count) {
            return $teams->count();
        }

        if ($paginate) {
            return $teams->paginate($perPage);
        }

        return $teams->get();
    }

    public function create(array $data = []): Team
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'team',
            deleteAsset: false,
        );

        return Team::create($data);
    }

    public function update(Team $team, array $data = []): Team
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'team',
            checkAsset: $team->checkImage(),
            fileAsset: $team->image,
            deleteAsset: true,
        );

        $team->update($data);
        $team->refresh();

        return $team;
    }

    public function active(Team $team): Team
    {
        $team->is_active = ! $team->is_active;
        $team->save();
        $team->refresh();

        return $team;
    }

    public function deleteImage(Team $team)
    {
        $team->deleteImage();

        $team->image = null;
        $team->save();
        $team->refresh();

        return $team;
    }

    public function delete(Team $team): bool
    {
        return $team->delete();
    }

    public function deleteAll(array $teams = []): bool
    {
        return Team::when($teams, fn ($q) => $q->whereIn('id', $teams))->delete();
    }

    public function restore(Team $team): bool
    {
        return $team->restore();
    }

    public function restoreAll(array $teams = []): bool
    {
        return Team::when($teams, fn ($q) => $q->whereIn('id', $teams))->onlyTrashed()->restore();
    }

    public function deletePermanent(Team $team): bool
    {
        $team->deleteImage();

        return $team->forceDelete();
    }

    public function deletePermanentAll(array $teams = []): bool
    {
        $teams = Team::when($teams, fn ($q) => $q->whereIn('id', $teams))->onlyTrashed()->get();

        foreach ($teams as $team) {
            $team->deleteImage();
            $team->forceDelete();
        }

        return true;
    }
}
