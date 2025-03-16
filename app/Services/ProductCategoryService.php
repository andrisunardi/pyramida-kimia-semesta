<?php

namespace App\Services;

use Andrisunardi\Library\Libraries\LivewireUpload;
use App\Models\ProductCategory;
use Illuminate\Support\Str;

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
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('name_id', 'LIKE', "%{$search}%")
                    ->orWhere('name_zh', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhere('description_id', 'LIKE', "%{$search}%")
                    ->orWhere('description_zh', 'LIKE', "%{$search}%")
                    ->orWhere('slug', 'LIKE', "%{$search}%");
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
        $slug = Str::slug($data['name']);

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'product/category',
            deleteAsset: false,
        );

        $data['slug'] = $slug;

        return ProductCategory::create($data);
    }

    public function update(ProductCategory $productCategory, array $data = []): ProductCategory
    {
        $slug = Str::slug($data['name']);

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'product/category',
            checkAsset: $productCategory->checkImage(),
            fileAsset: $productCategory->image,
            deleteAsset: true,
        );

        $data['slug'] = $slug;

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
