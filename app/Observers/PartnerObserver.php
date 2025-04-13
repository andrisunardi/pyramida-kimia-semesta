<?php

namespace App\Observers;

use App\Models\Partner;
use Illuminate\Support\Facades\Auth;

class PartnerObserver
{
    public function creating(Partner $partner): void
    {
        $partner->created_by = Auth::user()->id ?? null;
    }

    public function created(Partner $partner): void
    {
        $partner->created_by = Auth::user()->id ?? null;
    }

    public function updating(Partner $partner): void
    {
        $partner->updated_by = Auth::user()->id ?? null;
    }

    public function updated(Partner $partner): void
    {
        $partner->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(Partner $partner): void
    {
        $partner->deleted_by = Auth::user()->id ?? null;
        $partner->save();
    }

    public function deleted(Partner $partner): void
    {
        $partner->deleted_by = Auth::user()->id ?? null;
        $partner->save();
    }

    public function restoring(Partner $partner): void
    {
        $partner->deleted_by = null;
        $partner->save();
    }

    public function restored(Partner $partner): void
    {
        $partner->deleted_by = null;
        $partner->save();
    }

    public function forceDeleted(Partner $partner): void {}
}
