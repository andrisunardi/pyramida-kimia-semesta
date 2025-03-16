<?php

namespace App\Livewire;

class Banner extends Component
{
    public function render()
    {
        $page = request()->route()->uri();

        return view('livewire.banner', ['page' => $page]);
    }
}
