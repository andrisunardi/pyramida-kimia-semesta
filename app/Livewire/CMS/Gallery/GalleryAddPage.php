<?php

namespace App\Livewire\CMS\Gallery;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Gallery\GalleryAddForm;
use App\Services\GalleryCategoryService;
use Illuminate\Contracts\View\View;

class GalleryAddPage extends Component
{
    public GalleryAddForm $form;

    public function resetFields(): void
    {
        $this->form->reset();

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit();

        $this->flash('success', trans('index.add').' '.trans('index.success'), [
            'html' => trans('index.gallery').' '.trans('index.has_been_successfully_added'),
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

    public function render(): View
    {
        return view('livewire.cms.gallery.add', [
            'galleryCategories' => $this->getGalleryCategories(),
        ]);
    }
}
