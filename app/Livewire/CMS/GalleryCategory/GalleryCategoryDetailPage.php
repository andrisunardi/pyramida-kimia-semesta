<?php

namespace App\Livewire\CMS\GalleryCategory;

use App\Livewire\Component;
use App\Models\GalleryCategory;
use App\Services\GalleryCategoryService;
use Illuminate\Contracts\View\View;

class GalleryCategoryDetailPage extends Component
{
    public GalleryCategory $galleryCategory;

    public function mount(GalleryCategory $galleryCategory): void
    {
        $this->galleryCategory = $galleryCategory;
    }

    public function changeActive(GalleryCategory $galleryCategory): void
    {
        (new GalleryCategoryService)->active(galleryCategory: $galleryCategory);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.gallery_category').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(GalleryCategory $galleryCategory): void
    {
        (new GalleryCategoryService)->delete(galleryCategory: $galleryCategory);

        $this->flash('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.gallery_category').' '.trans('index.has_been_successfully_deleted'),
        ]);

        $this->redirect(route('cms.gallery-category.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.gallery-category.detail');
    }
}
