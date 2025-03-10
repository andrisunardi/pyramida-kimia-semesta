<?php

namespace App\Observers;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactObserver
{
    public function creating(Contact $contact)
    {
        $contact->created_by = Auth::user()->id ?? null;
    }

    public function created(Contact $contact)
    {
        $contact->created_by = Auth::user()->id ?? null;
    }

    public function updating(Contact $contact)
    {
        $contact->updated_by = Auth::user()->id ?? null;
    }

    public function updated(Contact $contact)
    {
        $contact->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(Contact $contact)
    {
        $contact->deleted_by = Auth::user()->id ?? null;
        $contact->save();
    }

    public function deleted(Contact $contact)
    {
        $contact->deleted_by = Auth::user()->id ?? null;
        $contact->save();
    }

    public function restoring(Contact $contact)
    {
        $contact->deleted_by = null;
        $contact->save();
    }

    public function restored(Contact $contact)
    {
        $contact->deleted_by = null;
        $contact->save();
    }

    public function forceDeleted(Contact $contact) {}
}
