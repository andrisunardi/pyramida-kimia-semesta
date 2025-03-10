<?php

namespace App\Observers;

use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;

class GalleryObserver
{
    public function creating(Gallery $gallery)
    {
        $gallery->created_by = Auth::user()->id ?? null;
    }

    public function created(Gallery $gallery)
    {
        $gallery->created_by = Auth::user()->id ?? null;
    }

    public function updating(Gallery $gallery)
    {
        $gallery->updated_by = Auth::user()->id ?? null;
    }

    public function updated(Gallery $gallery)
    {
        $gallery->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(Gallery $gallery)
    {
        $gallery->deleted_by = Auth::user()->id ?? null;
        $gallery->save();
    }

    public function deleted(Gallery $gallery)
    {
        $gallery->deleted_by = Auth::user()->id ?? null;
        $gallery->save();
    }

    public function restoring(Gallery $gallery)
    {
        $gallery->deleted_by = null;
        $gallery->save();
    }

    public function restored(Gallery $gallery)
    {
        $gallery->deleted_by = null;
        $gallery->save();
    }

    public function forceDeleted(Gallery $gallery) {}
}
