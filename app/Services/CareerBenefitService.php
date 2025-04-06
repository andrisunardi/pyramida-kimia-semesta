<?php

namespace App\Services;

use Andrisunardi\Library\Libraries\LivewireUpload;
use App\Models\CareerBenefit;

class CareerBenefitService
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
        $careerBenefits = CareerBenefit::query()
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
            return $careerBenefits->first();
        }

        if ($count) {
            return $careerBenefits->count();
        }

        if ($paginate) {
            return $careerBenefits->paginate($perPage);
        }

        return $careerBenefits->get();
    }

    public function create(array $data = []): CareerBenefit
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'careerBenefit',
            deleteAsset: false,
        );

        return CareerBenefit::create($data);
    }

    public function update(CareerBenefit $careerBenefit, array $data = []): CareerBenefit
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'careerBenefit',
            checkAsset: $careerBenefit->checkImage(),
            fileAsset: $careerBenefit->image,
            deleteAsset: true,
        );

        $careerBenefit->update($data);
        $careerBenefit->refresh();

        return $careerBenefit;
    }

    public function active(CareerBenefit $careerBenefit): CareerBenefit
    {
        $careerBenefit->is_active = ! $careerBenefit->is_active;
        $careerBenefit->save();
        $careerBenefit->refresh();

        return $careerBenefit;
    }

    public function deleteImage(CareerBenefit $careerBenefit)
    {
        $careerBenefit->deleteImage();

        $careerBenefit->image = null;
        $careerBenefit->save();
        $careerBenefit->refresh();

        return $careerBenefit;
    }

    public function delete(CareerBenefit $careerBenefit): bool
    {
        return $careerBenefit->delete();
    }

    public function deleteAll(array $careerBenefits = []): bool
    {
        return CareerBenefit::when($careerBenefits, fn ($q) => $q->whereIn('id', $careerBenefits))->delete();
    }

    public function restore(CareerBenefit $careerBenefit): bool
    {
        return $careerBenefit->restore();
    }

    public function restoreAll(array $careerBenefits = []): bool
    {
        return CareerBenefit::when($careerBenefits, fn ($q) => $q->whereIn('id', $careerBenefits))->onlyTrashed()->restore();
    }

    public function deletePermanent(CareerBenefit $careerBenefit): bool
    {
        $careerBenefit->deleteImage();

        return $careerBenefit->forceDelete();
    }

    public function deletePermanentAll(array $careerBenefits = []): bool
    {
        $careerBenefits = CareerBenefit::when($careerBenefits, fn ($q) => $q->whereIn('id', $careerBenefits))->onlyTrashed()->get();

        foreach ($careerBenefits as $careerBenefit) {
            $careerBenefit->deleteImage();
            $careerBenefit->forceDelete();
        }

        return true;
    }
}
