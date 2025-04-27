<?php

namespace App\Livewire\CMS\Layouts;

use App\Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

class SearchMenu extends Component
{
    public string $search_menu;

    public function mount(): void
    {
        $this->search_menu = Route::currentRouteName();
    }

    public function submit(): void
    {
        $this->redirect(route($this->search_menu), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.layouts.search-menu', [
            'menus' => config('menus'),
        ]);
    }
}
