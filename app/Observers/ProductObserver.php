<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductObserver
{
    public function creating(Product $product)
    {
        $product->slug = Str::slug($product->name);
        $product->created_by = Auth::user()->id ?? null;
    }

    public function created(Product $product)
    {
        $product->slug = Str::slug($product->name);
        $product->created_by = Auth::user()->id ?? null;
    }

    public function updating(Product $product)
    {
        $product->slug = Str::slug($product->name);
        $product->updated_by = Auth::user()->id ?? null;
    }

    public function updated(Product $product)
    {
        $product->slug = Str::slug($product->name);
        $product->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(Product $product)
    {
        $product->deleted_by = Auth::user()->id ?? null;
        $product->save();
    }

    public function deleted(Product $product)
    {
        $product->deleted_by = Auth::user()->id ?? null;
        $product->save();
    }

    public function restoring(Product $product)
    {
        $product->deleted_by = null;
        $product->save();
    }

    public function restored(Product $product)
    {
        $product->deleted_by = null;
        $product->save();
    }

    public function forceDeleted(Product $product) {}
}
