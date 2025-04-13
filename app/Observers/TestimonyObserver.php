<?php

namespace App\Observers;

use App\Models\Testimony;
use Illuminate\Support\Facades\Auth;

class TestimonyObserver
{
    public function creating(Testimony $testimony): void
    {
        $testimony->created_by = Auth::user()->id ?? null;
    }

    public function created(Testimony $testimony): void
    {
        $testimony->created_by = Auth::user()->id ?? null;
    }

    public function updating(Testimony $testimony): void
    {
        $testimony->updated_by = Auth::user()->id ?? null;
    }

    public function updated(Testimony $testimony): void
    {
        $testimony->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(Testimony $testimony): void
    {
        $testimony->deleted_by = Auth::user()->id ?? null;
        $testimony->save();
    }

    public function deleted(Testimony $testimony): void
    {
        $testimony->deleted_by = Auth::user()->id ?? null;
        $testimony->save();
    }

    public function restoring(Testimony $testimony): void
    {
        $testimony->deleted_by = null;
        $testimony->save();
    }

    public function restored(Testimony $testimony): void
    {
        $testimony->deleted_by = null;
        $testimony->save();
    }

    public function forceDeleted(Testimony $testimony): void {}
}
