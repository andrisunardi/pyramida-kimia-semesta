<?php

namespace App\Observers;

use App\Models\Partner;
use Illuminate\Support\Facades\Auth;

class PartnerObserver
{
    public function creating(Partner $partner)
    {
        $partner->created_by = Auth::user()->id ?? null;
    }

    public function created(Partner $partner)
    {
        $partner->created_by = Auth::user()->id ?? null;
    }

    public function updating(Partner $partner)
    {
        $partner->updated_by = Auth::user()->id ?? null;
    }

    public function updated(Partner $partner)
    {
        $partner->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(Partner $partner)
    {
        $partner->deleted_by = Auth::user()->id ?? null;
        $partner->save();
    }

    public function deleted(Partner $partner)
    {
        $partner->deleted_by = Auth::user()->id ?? null;
        $partner->save();
    }

    public function restoring(Partner $partner)
    {
        $partner->deleted_by = null;
        $partner->save();
    }

    public function restored(Partner $partner)
    {
        $partner->deleted_by = null;
        $partner->save();
    }

    public function forceDeleted(Partner $partner) {}
}
