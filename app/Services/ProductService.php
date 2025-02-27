<?php

namespace App\Services;

use Andrisunardi\Library\Libraries\LivewireUpload;
use App\Models\Product;

class ProductService
{
    public function index(
        ?string $search = '',
        int|string|null $productCategoryId = null,
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
        $products = Product::query()
            ->when($search, fn ($q) => $q->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhereRelation('category', 'name', 'LIKE', "%{$search}%");
            }))
            ->when($productCategoryId, fn ($q) => $q->where('product_category_id', $productCategoryId))
            ->when($isActive, fn ($q) => $q->whereIn('is_active', $isActive))
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $products->first();
        }

        if ($count) {
            return $products->count();
        }

        if ($paginate) {
            return $products->paginate($perPage);
        }

        return $products->get();
    }

    public function create(array $data = []): Product
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'product',
            deleteAsset: false,
        );

        $data['image_coa'] = LivewireUpload::upload(
            file: $data['image_coa'],
            name: $data['name'],
            disk: 'images',
            directory: 'product/coa',
            deleteAsset: false,
        );

        $data['image_msds'] = LivewireUpload::upload(
            file: $data['image_msds'],
            name: $data['name'],
            disk: 'images',
            directory: 'product/msds',
            deleteAsset: false,
        );

        return Product::create($data);
    }

    public function update(Product $product, array $data = []): Product
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'product',
            checkAsset: $product->checkImage(),
            fileAsset: $product->image,
            deleteAsset: true,
        );

        $data['image_coa'] = LivewireUpload::upload(
            file: $data['image_coa'],
            name: $data['name'],
            disk: 'images',
            directory: 'product/coa',
            checkAsset: $product->checkImageCoa(),
            fileAsset: $product->image_coa,
            deleteAsset: true,
        );

        $data['image_msds'] = LivewireUpload::upload(
            file: $data['image_msds'],
            name: $data['name'],
            disk: 'images',
            directory: 'product/msds',
            checkAsset: $product->checkImageMsds(),
            fileAsset: $product->image_msds,
            deleteAsset: true,
        );

        $product->update($data);
        $product->refresh();

        return $product;
    }

    public function active(Product $product): Product
    {
        $product->is_active = ! $product->is_active;
        $product->save();
        $product->refresh();

        return $product;
    }

    public function delete(Product $product): bool
    {
        return $product->delete();
    }
}
