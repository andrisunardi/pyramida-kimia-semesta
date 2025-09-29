<?php

namespace App\Livewire\Forms\CMS\Gallery;

use App\Models\Gallery;
use App\Services\GalleryService;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class GalleryAddForm extends Form
{
    #[Validate('required|integer|exists:gallery_categories,id')]
    public string $gallery_category_id = '';

    #[Validate('required|string|min:1|max:100|unique:galleries,name')]
    public string $name = '';

    #[Validate('required|string|min:1|max:100|unique:galleries,name_id')]
    public string $name_id = '';

    #[Validate('required|string|min:1|max:100|unique:galleries,name_zh')]
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

    public function rules(): array
    {
        return [
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
        ];
    }

    public function submit(): Gallery
    {
        return (new GalleryService)->create(data: $this->validate());
    }
}
