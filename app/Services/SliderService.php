<?php

namespace App\Services;

use Andrisunardi\Library\Libraries\LivewireUpload;
use App\Models\Slider;

class SliderService
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
        $sliders = Slider::query()
            ->when($search, fn ($q) => $q->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
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
            return $sliders->first();
        }

        if ($count) {
            return $sliders->count();
        }

        if ($paginate) {
            return $sliders->paginate($perPage);
        }

        return $sliders->get();
    }

    public function create(array $data = []): Slider
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'slider',
            deleteAsset: false,
        );

        return Slider::create($data);
    }

    public function update(Slider $slider, array $data = []): Slider
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'slider',
            checkAsset: $slider->checkImage(),
            fileAsset: $slider->image,
            deleteAsset: true,
        );

        $slider->update($data);
        $slider->refresh();

        return $slider;
    }

    public function active(Slider $slider): Slider
    {
        $slider->is_active = ! $slider->is_active;
        $slider->save();
        $slider->refresh();

        return $slider;
    }

    public function deleteImage(Slider $slider)
    {
        $slider->deleteImage();

        $slider->image = null;
        $slider->save();
        $slider->refresh();

        return $slider;
    }

    public function delete(Slider $slider): bool
    {
        return $slider->delete();
    }

    public function deleteAll(array $sliders = []): bool
    {
        return Slider::when($sliders, fn ($q) => $q->whereIn('id', $sliders))->delete();
    }

    public function restore(Slider $slider): bool
    {
        return $slider->restore();
    }

    public function restoreAll(array $sliders = []): bool
    {
        return Slider::when($sliders, fn ($q) => $q->whereIn('id', $sliders))->onlyTrashed()->restore();
    }

    public function deletePermanent(Slider $slider): bool
    {
        $slider->deleteImage();

        return $slider->forceDelete();
    }

    public function deletePermanentAll(array $sliders = []): bool
    {
        $sliders = Slider::when($sliders, fn ($q) => $q->whereIn('id', $sliders))->onlyTrashed()->get();

        foreach ($sliders as $slider) {
            $slider->deleteImage();
            $slider->forceDelete();
        }

        return true;
    }
}
