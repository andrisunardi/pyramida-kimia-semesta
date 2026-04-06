<?php

namespace App\Observers;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventObserver
{
    public function creating(Event $event): void
    {
        $event->created_by = Auth::user()->id ?? null;
    }

    public function created(Event $event): void
    {
        $event->created_by = Auth::user()->id ?? null;
    }

    public function updating(Event $event): void
    {
        $event->updated_by = Auth::user()->id ?? null;
    }

    public function updated(Event $event): void
    {
        $event->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(Event $event): void
    {
        $event->deleted_by = Auth::user()->id ?? null;
        $event->save();
    }

    public function deleted(Event $event): void
    {
        $event->deleted_by = Auth::user()->id ?? null;
        $event->save();
    }

    public function restoring(Event $event): void
    {
        $event->deleted_by = null;
        $event->save();
    }

    public function restored(Event $event): void
    {
        $event->deleted_by = null;
        $event->save();
    }

    public function forceDeleted(Event $event): void {}
}
