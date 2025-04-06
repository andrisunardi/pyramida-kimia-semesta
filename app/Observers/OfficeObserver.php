<?php

namespace App\Observers;

use App\Models\Office;
use Illuminate\Support\Facades\Auth;

class OfficeObserver
{
    public function creating(Office $office)
    {
        $office->created_by = Auth::user()->id ?? null;
    }

    public function created(Office $office)
    {
        $office->created_by = Auth::user()->id ?? null;
    }

    public function updating(Office $office)
    {
        $office->updated_by = Auth::user()->id ?? null;
    }

    public function updated(Office $office)
    {
        $office->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(Office $office)
    {
        $office->deleted_by = Auth::user()->id ?? null;
        $office->save();
    }

    public function deleted(Office $office)
    {
        $office->deleted_by = Auth::user()->id ?? null;
        $office->save();
    }

    public function restoring(Office $office)
    {
        $office->deleted_by = null;
        $office->save();
    }

    public function restored(Office $office)
    {
        $office->deleted_by = null;
        $office->save();
    }

    public function forceDeleted(Office $office) {}
}
