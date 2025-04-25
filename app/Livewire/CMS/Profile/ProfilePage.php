<?php

namespace App\Livewire\CMS\Profile;

use App\Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class ProfilePage extends Component
{
    public function lastActivity(): Activity
    {
        return Auth::user()->activities->loadMissing('subject', 'causer')->last();
    }

    public function render(): View
    {
        return view('livewire.cms.profile.index', [
            'lastActivity' => $this->lastActivity(),
        ]);
    }
}
