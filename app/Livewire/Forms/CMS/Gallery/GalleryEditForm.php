<?php

namespace App\Livewire\Forms\CMS\Gallery;

use App\Models\Gallery;
use App\Services\GalleryService;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class GalleryEditForm extends Form
{
    public Gallery $gallery;

    #[Validate('required|integer|exists:gallery_categories,id')]
    public string $gallery_category_id = '';

    #[Validate('required|string|min:1|max:100')]
    public string $name = '';

    #[Validate('required|string|min:1|max:100')]
    public string $name_id = '';

    #[Validate('required|string|min:1|max:100')]
    public string $name_zh = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description_id = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description_zh = '';

    public ?TemporaryUploadedFile $image = null;

    #[Validate('required|boolean')]
    public bool $is_active = true;

    public function set(Gallery $gallery): void
    {
        $this->gallery = $gallery;
        $this->gallery_category_id = $gallery->gallery_category_id;
        $this->name = $gallery->name;
        $this->name_id = $gallery->name_id;
        $this->name_zh = $gallery->name_zh;
        $this->description = $gallery->description;
        $this->description_id = $gallery->description_id;
        $this->description_zh = $gallery->description_zh;
        $this->is_active = $gallery->is_active;
    }

    public function rules(): array
    {
        return [
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
        ];
    }

    public function submit(Gallery $gallery): Gallery
    {
        return (new GalleryService)->update(gallery: $gallery, data: $this->validate());
    }
}
