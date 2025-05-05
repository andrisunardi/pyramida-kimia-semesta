<?php

namespace App\Livewire\Forms\CMS\GalleryCategory;

use App\Models\GalleryCategory;
use App\Services\GalleryCategoryService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class GalleryCategoryEditForm extends Form
{
    public GalleryCategory $galleryCategory;

    public string $name = '';

    public string $name_id = '';

    public string $name_zh = '';

    #[Validate('required|boolean')]
    public bool $is_active = true;

    public function set(GalleryCategory $galleryCategory): void
    {
        $this->galleryCategory = $galleryCategory;
        $this->name = $galleryCategory->name;
        $this->name_id = $galleryCategory->name_id;
        $this->name_zh = $galleryCategory->name_zh;
        $this->is_active = $galleryCategory->is_active;
    }

    public function rules(): array
    {
        return [
            'name' => "required|string|min:1|max:100|unique:gallery_categories,name,{$this->galleryCategory->id}",
            'name_id' => "required|string|min:1|max:100|unique:gallery_categories,name_id,{$this->galleryCategory->id}",
            'name_zh' => "required|string|min:1|max:100|unique:gallery_categories,name_zh,{$this->galleryCategory->id}",
        ];
    }

    public function submit(GalleryCategory $galleryCategory): GalleryCategory
    {
        return (new GalleryCategoryService)->update(galleryCategory: $galleryCategory, data: $this->validate());
    }
}
