<?php

namespace App\Livewire\CMS\Gallery;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Gallery\GalleryEditForm;
use App\Models\Gallery;
use App\Services\GalleryCategoryService;

class GalleryEditPage extends Component
{
    public GalleryEditForm $form;

    public Gallery $gallery;

    public function mount(Gallery $gallery): void
    {
        $this->gallery = $gallery;
        $this->form->set(gallery: $gallery);
    }

    public function resetFields(): void
    {
        $this->form->set(gallery: $this->gallery);

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit(gallery: $this->gallery);

        $this->flash('success', trans('index.edit').' '.trans('index.success'), [
            'html' => trans('index.gallery').' '.trans('index.has_been_successfully_edited'),
        ]);

        $this->redirect(route('cms.gallery.index'), navigate: true);
    }

    public function getGalleryCategories(): object
    {
        return (new GalleryCategoryService)->index(
            isActive: [true],
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function render()
    {
        return view('livewire.cms.gallery.edit', [
            'galleryCategories' => $this->getGalleryCategories(),
        ]);
    }
}
