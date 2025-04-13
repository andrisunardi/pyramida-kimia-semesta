<?php

namespace App\Observers;

use App\Models\GalleryCategory;
use Illuminate\Support\Facades\Auth;

class GalleryCategoryObserver
{
    public function creating(GalleryCategory $galleryCategory): void
    {
        $galleryCategory->created_by = Auth::user()->id ?? null;
    }

    public function created(GalleryCategory $galleryCategory): void
    {
        $galleryCategory->created_by = Auth::user()->id ?? null;
    }

    public function updating(GalleryCategory $galleryCategory): void
    {
        $galleryCategory->updated_by = Auth::user()->id ?? null;
    }

    public function updated(GalleryCategory $galleryCategory): void
    {
        $galleryCategory->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(GalleryCategory $galleryCategory): void
    {
        $galleryCategory->deleted_by = Auth::user()->id ?? null;
        $galleryCategory->save();
    }

    public function deleted(GalleryCategory $galleryCategory): void
    {
        $galleryCategory->deleted_by = Auth::user()->id ?? null;
        $galleryCategory->save();
    }

    public function restoring(GalleryCategory $galleryCategory): void
    {
        $galleryCategory->deleted_by = null;
        $galleryCategory->save();
    }

    public function restored(GalleryCategory $galleryCategory): void
    {
        $galleryCategory->deleted_by = null;
        $galleryCategory->save();
    }

    public function forceDeleted(GalleryCategory $galleryCategory): void {}
}
