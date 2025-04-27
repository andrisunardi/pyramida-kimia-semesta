<?php

namespace App\Livewire\CMS\Home;

use App\Livewire\Component;
use Illuminate\Support\Facades\DB;

class HomeMenuComponent extends Component
{
    public function getMenus()
    {
        return collect(config('menus'))->flatMap(function ($menu) {
            $menu['total'] = $menu['table'] ?
                DB::table($menu['table'])->count() :
                count(collect($menu['subMenus'])->filter(function ($subMenu) {
                    return ! is_null($subMenu['table']);
                }));

            if ($menu['subMenus']) {
                $menu['subMenus'] = collect($menu['subMenus'])->map(function ($subMenu) {
                    $subMenu['total'] = $subMenu['table'] ? DB::table($subMenu['table'])->count() : 0;

                    return $subMenu;
                })->all();
            }

            return [$menu] + ($menu['subMenus'] ?? []);
        })->all();
    }

    public function render()
    {
        return view('livewire.cms.home.menu', [
            'menus' => $this->getMenus(),
            'bgClasses' => $this->getBgClasses(),
        ]);
    }
}
