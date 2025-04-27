<?php

namespace App\Observers;

use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class SettingObserver
{
    public function creating(Setting $setting): void
    {
        $setting->created_by = Auth::user()->id ?? null;
    }

    public function created(Setting $setting): void
    {
        $setting->created_by = Auth::user()->id ?? null;
    }

    public function updating(Setting $setting): void
    {
        $setting->updated_by = Auth::user()->id ?? null;
    }

    public function updated(Setting $setting): void
    {
        $setting->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(Setting $setting): void
    {
        $setting->deleted_by = Auth::user()->id ?? null;
        $setting->save();
    }

    public function deleted(Setting $setting): void
    {
        $setting->deleted_by = Auth::user()->id ?? null;
        $setting->save();
    }

    public function restoring(Setting $setting): void
    {
        $setting->deleted_by = null;
        $setting->save();
    }

    public function restored(Setting $setting): void
    {
        $setting->deleted_by = null;
        $setting->save();
    }

    public function forceDeleted(Setting $setting): void {}
}
