<?php

namespace App\Livewire\CMS\Configuration\Setting;

use App\Livewire\Component;
use App\Models\Setting;
use App\Services\SettingService;

class SettingRestore extends Component
{
    public function mount($setting)
    {
        $setting = Setting::onlyTrashed()->findOrFail($setting);

        (new SettingService)->restore(setting: $setting);

        $this->flash('success', trans('index.restore_success'), [
            'html' => trans('index.setting')." - {$setting->id} - ".trans('index.restored'),
        ]);

        return redirect(url()->previous());
    }
}
