<?php

namespace App\Observers;

use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TeamObserver
{
    public function creating(Team $team): void
    {
        $team->slug = Str::slug($team->name);
        $team->created_by = Auth::user()->id ?? null;
    }

    public function created(Team $team): void
    {
        $team->slug = Str::slug($team->name);
        $team->created_by = Auth::user()->id ?? null;
    }

    public function updating(Team $team): void
    {
        $team->slug = Str::slug($team->name);
        $team->updated_by = Auth::user()->id ?? null;
    }

    public function updated(Team $team): void
    {
        $team->slug = Str::slug($team->name);
        $team->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(Team $team): void
    {
        $team->deleted_by = Auth::user()->id ?? null;
        $team->save();
    }

    public function deleted(Team $team): void
    {
        $team->deleted_by = Auth::user()->id ?? null;
        $team->save();
    }

    public function restoring(Team $team): void
    {
        $team->deleted_by = null;
        $team->save();
    }

    public function restored(Team $team): void
    {
        $team->deleted_by = null;
        $team->save();
    }

    public function forceDeleted(Team $team): void {}
}
