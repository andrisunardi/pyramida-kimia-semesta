<?php

namespace App\Livewire\CMS\GalleryCategory;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\GalleryCategory\GalleryCategoryAddForm;
use Illuminate\Contracts\View\View;

class GalleryCategoryAddPage extends Component
{
    public GalleryCategoryAddForm $form;

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
            'html' => trans('index.gallery_category').' '.trans('index.has_been_successfully_added'),
        ]);

        $this->redirect(route('cms.gallery-category.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.gallery-category.add');
    }
}
