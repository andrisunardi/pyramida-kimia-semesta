<?php

namespace App\Livewire\Forms\CMS\Product;

use App\Models\Product;
use App\Services\ProductService;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class ProductAddForm extends Form
{
    #[Validate('required|integer|exists:product_categories,name')]
    public string $product_category_id = '';

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

    public ?TemporaryUploadedFile $file_coa = null;

    public ?TemporaryUploadedFile $file_msds = null;

    #[Validate('required|boolean')]
    public bool $is_active = true;

    public function rules(): array
    {
        return [
            'image' => 'nullable|image|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
            'file_coa' => 'nullable|file|max:'.env('MAX_FILE').'|mimes:'.env('MIMES_FILE'),
            'file_msds' => 'nullable|file|max:'.env('MAX_FILE').'|mimes:'.env('MIMES_FILE'),
        ];
    }

    public function submit(): Product
    {
        return (new ProductService)->create(data: $this->validate());
    }
}
