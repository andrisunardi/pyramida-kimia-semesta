<?php

namespace App\Observers;

use App\Models\Slider;
use Illuminate\Support\Facades\Auth;

class SliderObserver
{
    public function creating(Slider $slider): void
    {
        $slider->created_by = Auth::user()->id ?? null;
    }

    public function created(Slider $slider): void
    {
        $slider->created_by = Auth::user()->id ?? null;
    }

    public function updating(Slider $slider): void
    {
        $slider->updated_by = Auth::user()->id ?? null;
    }

    public function updated(Slider $slider): void
    {
        $slider->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(Slider $slider): void
    {
        $slider->deleted_by = Auth::user()->id ?? null;
        $slider->save();
    }

    public function deleted(Slider $slider): void
    {
        $slider->deleted_by = Auth::user()->id ?? null;
        $slider->save();
    }

    public function restoring(Slider $slider): void
    {
        $slider->deleted_by = null;
        $slider->save();
    }

    public function restored(Slider $slider): void
    {
        $slider->deleted_by = null;
        $slider->save();
    }

    public function forceDeleted(Slider $slider): void {}
}
