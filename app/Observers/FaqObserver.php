<?php

namespace App\Observers;

use App\Models\Faq;
use Illuminate\Support\Facades\Auth;

class FaqObserver
{
    public function creating(Faq $faq)
    {
        $faq->created_by = Auth::user()->id ?? null;
    }

    public function created(Faq $faq)
    {
        $faq->created_by = Auth::user()->id ?? null;
    }

    public function updating(Faq $faq)
    {
        $faq->updated_by = Auth::user()->id ?? null;
    }

    public function updated(Faq $faq)
    {
        $faq->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(Faq $faq)
    {
        $faq->deleted_by = Auth::user()->id ?? null;
        $faq->save();
    }

    public function deleted(Faq $faq)
    {
        $faq->deleted_by = Auth::user()->id ?? null;
        $faq->save();
    }

    public function restoring(Faq $faq)
    {
        $faq->deleted_by = null;
        $faq->save();
    }

    public function restored(Faq $faq)
    {
        $faq->deleted_by = null;
        $faq->save();
    }

    public function forceDeleted(Faq $faq) {}
}
