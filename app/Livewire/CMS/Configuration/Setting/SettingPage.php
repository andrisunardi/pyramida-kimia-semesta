<?php

namespace App\Livewire\CMS\Configuration\Setting;

use App\Livewire\Component;
use App\Services\SettingService;

class SettingPage extends Component
{
    public $key = '';

    public $value = '';

    public $is_active = [];

    public $queryString = [
        'key',
        'value',
        'is_active',
    ];

    public function updating()
    {
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->resetPage();

        $this->reset([
            'key',
            'value',
            'is_active',
        ]);
    }

    public function getSettings()
    {
        return (new SettingService)->index(
            key: $this->key,
            value: $this->value,
            is_active: $this->is_active,
            trash: false,
        );
    }

    public function render()
    {
        return view('livewire.cms.configuration.setting.index', [
            'settings' => $this->getSettings(),
        ]);
    }
}
