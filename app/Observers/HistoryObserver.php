<?php

namespace App\Observers;

use App\Models\History;
use Illuminate\Support\Facades\Auth;

class HistoryObserver
{
    public function creating(History $history)
    {
        $history->created_by = Auth::user()->id ?? null;
    }

    public function created(History $history)
    {
        $history->created_by = Auth::user()->id ?? null;
    }

    public function updating(History $history)
    {
        $history->updated_by = Auth::user()->id ?? null;
    }

    public function updated(History $history)
    {
        $history->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(History $history)
    {
        $history->deleted_by = Auth::user()->id ?? null;
        $history->save();
    }

    public function deleted(History $history)
    {
        $history->deleted_by = Auth::user()->id ?? null;
        $history->save();
    }

    public function restoring(History $history)
    {
        $history->deleted_by = null;
        $history->save();
    }

    public function restored(History $history)
    {
        $history->deleted_by = null;
        $history->save();
    }

    public function forceDeleted(History $history) {}
}
