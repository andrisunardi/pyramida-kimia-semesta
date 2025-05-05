<?php

namespace App\Livewire\Forms\CMS\GalleryCategory;

use App\Models\GalleryCategory;
use App\Services\GalleryCategoryService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class GalleryCategoryAddForm extends Form
{
    #[Validate('required|string|min:1|max:100|unique:gallery_categories,name')]
    public string $name = '';

    #[Validate('required|string|min:1|max:100|unique:gallery_categories,name_id')]
    public string $name_id = '';

    #[Validate('required|string|min:1|max:100|unique:gallery_categories,name_zh')]
    public string $name_zh = '';

    #[Validate('required|boolean')]
    public bool $is_active = true;

    public function submit(): GalleryCategory
    {
        return (new GalleryCategoryService)->create(data: $this->validate());
    }
}
