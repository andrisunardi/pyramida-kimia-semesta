<?php

namespace App\Livewire;

class Banner extends Component
{
    public string $title;

    public string $image;

    public function render()
    {
        $this->title = $this->title ?? trans('index.'.request()->route()->uri());
        $this->image = $this->image ?? asset('images/banner/'.request()->route()->uri().'.png');

        return view('livewire.banner', [
            'title' => $this->title,
            'image' => $this->image,
        ]);
    }
}
