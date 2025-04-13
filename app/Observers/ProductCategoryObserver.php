<?php

namespace App\Observers;

use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductCategoryObserver
{
    public function creating(ProductCategory $productCategory): void
    {
        $productCategory->slug = Str::slug($productCategory->name);
        $productCategory->created_by = Auth::user()->id ?? null;
    }

    public function created(ProductCategory $productCategory): void
    {
        $productCategory->slug = Str::slug($productCategory->name);
        $productCategory->created_by = Auth::user()->id ?? null;
    }

    public function updating(ProductCategory $productCategory): void
    {
        $productCategory->slug = Str::slug($productCategory->name);
        $productCategory->updated_by = Auth::user()->id ?? null;
    }

    public function updated(ProductCategory $productCategory): void
    {
        $productCategory->slug = Str::slug($productCategory->name);
        $productCategory->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(ProductCategory $productCategory): void
    {
        $productCategory->deleted_by = Auth::user()->id ?? null;
        $productCategory->save();
    }

    public function deleted(ProductCategory $productCategory): void
    {
        $productCategory->deleted_by = Auth::user()->id ?? null;
        $productCategory->save();
    }

    public function restoring(ProductCategory $productCategory): void
    {
        $productCategory->deleted_by = null;
        $productCategory->save();
    }

    public function restored(ProductCategory $productCategory): void
    {
        $productCategory->deleted_by = null;
        $productCategory->save();
    }

    public function forceDeleted(ProductCategory $productCategory): void {}
}
