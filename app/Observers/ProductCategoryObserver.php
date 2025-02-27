<?php

namespace App\Observers;

use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;

class ProductCategoryObserver
{
    public function creating(ProductCategory $productCategory)
    {
        $productCategory->created_by = Auth::user()->id ?? null;
        $productCategory->updated_by = Auth::user()->id ?? null;
    }

    public function created(ProductCategory $productCategory) {}

    public function updating(ProductCategory $productCategory)
    {
        $productCategory->updated_by = Auth::user()->id ?? null;
    }

    public function updated(ProductCategory $productCategory) {}

    public function deleting(ProductCategory $productCategory)
    {
        $productCategory->deleted_by = Auth::user()->id ?? null;
        $productCategory->save();
    }

    public function deleted(ProductCategory $productCategory) {}

    public function restoring(ProductCategory $productCategory)
    {
        $productCategory->deleted_by = null;
        $productCategory->save();
    }

    public function restored(ProductCategory $productCategory) {}

    public function forceDeleted(ProductCategory $productCategory) {}
}
