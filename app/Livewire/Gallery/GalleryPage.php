<?php

namespace App\Livewire\Gallery;

use App\Livewire\Component;
use App\Services\GalleryCategoryService;
use App\Services\GalleryService;
use Illuminate\Contracts\View\View;

class GalleryPage extends Component
{
    public function getGalleryCategories(): object
    {
        $galleryCategories = (new GalleryCategoryService)->index(
            isActive: [true],
            orderBy: 'id',
            sortBy: 'asc',
            paginate: false,
        );

        $galleryCategories->loadCount(['galleries']);

        return $galleryCategories;
    }

    public function getGalleries(): object
    {
        $galleries = (new GalleryService)->index(
            isActive: [true],
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );

        $galleries->loadMissing(['category']);

        return $galleries;
    }

    public function render(): View
    {
        return view('livewire.gallery.index', [
            'galleryCategories' => $this->getGalleryCategories(),
            'galleries' => $this->getGalleries(),
        ]);
    }
}
