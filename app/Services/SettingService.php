<?php

namespace App\Services;

use App\Models\Setting;

class SettingService
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
        $settings = Setting::query()
            ->when($search, fn ($q) => $q->where(function ($query) use ($search) {
                $query->where('key', 'LIKE', "%{$search}%")
                    ->orWhere('value', 'LIKE', "%{$search}%");
            }))
            ->when($isActive, fn ($q) => $q->whereIn('is_active', $isActive))
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $settings->first();
        }

        if ($count) {
            return $settings->count();
        }

        if ($paginate) {
            return $settings->paginate($perPage);
        }

        return $settings->get();
    }

    public function create(array $data = []): Setting
    {
        return Setting::create($data);
    }

    public function update(Setting $setting, array $data = []): Setting
    {
        $setting->update($data);
        $setting->refresh();

        return $setting;
    }

    public function active(Setting $setting): Setting
    {
        $setting->is_active = ! $setting->is_active;
        $setting->save();
        $setting->refresh();

        return $setting;
    }

    public function delete(Setting $setting): bool
    {
        return $setting->delete();
    }

    public function deleteAll(array $settings = []): bool
    {
        return Setting::when($settings, fn ($q) => $q->whereIn('id', $settings))->delete();
    }

    public function restore(Setting $setting): bool
    {
        return $setting->restore();
    }

    public function restoreAll(array $settings = []): bool
    {
        return Setting::when($settings, fn ($q) => $q->whereIn('id', $settings))->onlyTrashed()->restore();
    }

    public function deletePermanent(Setting $setting): bool
    {
        return $setting->forceDelete();
    }

    public function deletePermanentAll(array $settings = []): bool
    {
        $settings = Setting::when($settings, fn ($q) => $q->whereIn('id', $settings))->onlyTrashed()->get();

        foreach ($settings as $setting) {
            $setting->forceDelete();
        }

        return true;
    }
}
