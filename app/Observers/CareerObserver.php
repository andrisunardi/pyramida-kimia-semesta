<?php

namespace App\Observers;

use App\Models\Career;
use Illuminate\Support\Facades\Auth;

class CareerObserver
{
    public function creating(Career $career): void
    {
        $career->created_by = Auth::user()->id ?? null;
    }

    public function created(Career $career): void
    {
        $career->created_by = Auth::user()->id ?? null;
    }

    public function updating(Career $career): void
    {
        $career->updated_by = Auth::user()->id ?? null;
    }

    public function updated(Career $career): void
    {
        $career->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(Career $career): void
    {
        $career->deleted_by = Auth::user()->id ?? null;
        $career->save();
    }

    public function deleted(Career $career): void
    {
        $career->deleted_by = Auth::user()->id ?? null;
        $career->save();
    }

    public function restoring(Career $career): void
    {
        $career->deleted_by = null;
        $career->save();
    }

    public function restored(Career $career): void
    {
        $career->deleted_by = null;
        $career->save();
    }

    public function forceDeleted(Career $career): void {}
}
