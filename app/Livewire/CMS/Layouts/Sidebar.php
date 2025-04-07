<?php

namespace App\Livewire\CMS\Layouts;

use App\Livewire\Component;
use Detection\MobileDetect;
use Illuminate\Contracts\View\View;

class Sidebar extends Component
{
    public bool $isMobile = false;

    public function mount(): void
    {
        $this->isMobile = $this->isMobile();
    }

    private function isMobile(): bool
    {
        $detect = new MobileDetect;

        return $detect->isMobile() || $detect->isTablet();
    }

    public function render(): View
    {
        return view('livewire.cms.layouts.sidebar', [
            'menus' => config('menus'),
        ]);
    }
}
