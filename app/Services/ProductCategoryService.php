<?php

namespace App\Services;

use App\Models\ProductCategory;

class ProductCategoryService
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
        $productCategories = ProductCategory::query()
            ->when($search, fn ($q) => $q->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%");
            }))
            ->when($isActive, fn ($q) => $q->whereIn('is_active', $isActive))
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $productCategories->first();
        }

        if ($count) {
            return $productCategories->count();
        }

        if ($paginate) {
            return $productCategories->paginate($perPage);
        }

        return $productCategories->get();
    }

    public function create(array $data = []): ProductCategory
    {
        return ProductCategory::create($data);
    }

    public function update(ProductCategory $productCategory, array $data = []): ProductCategory
    {
        $productCategory->update($data);
        $productCategory->refresh();

        return $productCategory;
    }

    public function active(ProductCategory $productCategory): ProductCategory
    {
        $productCategory->is_active = ! $productCategory->is_active;
        $productCategory->save();
        $productCategory->refresh();

        return $productCategory;
    }

    public function delete(ProductCategory $productCategory): bool
    {
        return $productCategory->delete();
    }
}
