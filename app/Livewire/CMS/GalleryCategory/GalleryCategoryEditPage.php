<?php

namespace App\Livewire\CMS\GalleryCategory;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\GalleryCategory\GalleryCategoryEditForm;
use App\Models\GalleryCategory;

class GalleryCategoryEditPage extends Component
{
    public GalleryCategoryEditForm $form;

    public GalleryCategory $galleryCategory;

    public function mount(GalleryCategory $galleryCategory): void
    {
        $this->galleryCategory = $galleryCategory;
        $this->form->set(galleryCategory: $galleryCategory);
    }

    public function resetFields(): void
    {
        $this->form->set(galleryCategory: $this->galleryCategory);

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit(galleryCategory: $this->galleryCategory);

        $this->flash('success', trans('index.edit').' '.trans('index.success'), [
            'html' => trans('index.gallery_category').' '.trans('index.has_been_successfully_edited'),
        ]);

        $this->redirect(route('cms.gallery-category.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.cms.gallery-category.edit');
    }
}
