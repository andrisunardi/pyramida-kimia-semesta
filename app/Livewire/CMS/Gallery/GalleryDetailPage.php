<?php

namespace App\Livewire\CMS\Gallery;

use App\Livewire\Component;
use App\Models\Gallery;
use App\Services\GalleryService;
use Illuminate\Contracts\View\View;

class GalleryDetailPage extends Component
{
    public Gallery $gallery;

    public function mount(Gallery $gallery): void
    {
        $this->gallery = $gallery;
    }

    public function changeActive(Gallery $gallery): void
    {
        (new GalleryService)->active(gallery: $gallery);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.gallery').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(Gallery $gallery): void
    {
        (new GalleryService)->delete(gallery: $gallery);

        $this->flash('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.gallery').' '.trans('index.has_been_successfully_deleted'),
        ]);

        $this->redirect(route('cms.gallery.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.gallery.detail');
    }
}
