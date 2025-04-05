<?php

namespace App\Observers;

use App\Models\Career;
use Illuminate\Support\Facades\Auth;

class CareerObserver
{
    public function creating(Career $career)
    {
        $career->created_by = Auth::user()->id ?? null;
    }

    public function created(Career $career)
    {
        $career->created_by = Auth::user()->id ?? null;
    }

    public function updating(Career $career)
    {
        $career->updated_by = Auth::user()->id ?? null;
    }

    public function updated(Career $career)
    {
        $career->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(Career $career)
    {
        $career->deleted_by = Auth::user()->id ?? null;
        $career->save();
    }

    public function deleted(Career $career)
    {
        $career->deleted_by = Auth::user()->id ?? null;
        $career->save();
    }

    public function restoring(Career $career)
    {
        $career->deleted_by = null;
        $career->save();
    }

    public function restored(Career $career)
    {
        $career->deleted_by = null;
        $career->save();
    }

    public function forceDeleted(Career $career) {}
}
