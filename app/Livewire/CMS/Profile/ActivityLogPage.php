<?php

namespace App\Livewire\CMS\Profile;

use App\Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class ActivityLogPage extends Component
{
    public function getActivities(): object
    {
        return Activity::with('subject', 'causer')
            ->where('causer_id', Auth::user()->id)
            ->latest()
            ->paginate(10);
    }

    public function render(): View
    {
        return view('livewire.cms.profile.activity-log', [
            'activities' => $this->getActivities(),
        ]);
    }
}
