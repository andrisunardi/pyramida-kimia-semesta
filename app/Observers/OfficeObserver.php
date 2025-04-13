<?php

namespace App\Observers;

use App\Models\Office;
use Illuminate\Support\Facades\Auth;

class OfficeObserver
{
    public function creating(Office $office): void
    {
        $office->created_by = Auth::user()->id ?? null;
    }

    public function created(Office $office): void
    {
        $office->created_by = Auth::user()->id ?? null;
    }

    public function updating(Office $office): void
    {
        $office->updated_by = Auth::user()->id ?? null;
    }

    public function updated(Office $office): void
    {
        $office->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(Office $office): void
    {
        $office->deleted_by = Auth::user()->id ?? null;
        $office->save();
    }

    public function deleted(Office $office): void
    {
        $office->deleted_by = Auth::user()->id ?? null;
        $office->save();
    }

    public function restoring(Office $office): void
    {
        $office->deleted_by = null;
        $office->save();
    }

    public function restored(Office $office): void
    {
        $office->deleted_by = null;
        $office->save();
    }

    public function forceDeleted(Office $office): void {}
}
