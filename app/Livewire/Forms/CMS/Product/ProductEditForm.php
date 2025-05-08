<?php

namespace App\Livewire\Forms\CMS\Product;

use App\Models\Product;
use App\Services\ProductService;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class ProductEditForm extends Form
{
    public Product $product;

    #[Validate('required|integer|exists:product_categories,id')]
    public string $product_category_id = '';

    public string $name = '';

    public string $name_id = '';

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

    public function set(Product $product): void
    {
        $this->product = $product;
        $this->product_category_id = $product->product_category_id;
        $this->name = $product->name;
        $this->name_id = $product->name_id;
        $this->name_zh = $product->name_zh;
        $this->description = $product->description;
        $this->description_id = $product->description_id;
        $this->description_zh = $product->description_zh;
        $this->is_active = $product->is_active;
    }

    public function rules(): array
    {
        return [
            'name' => "required|string|min:1|max:100|unique:products,name,{$this->product->id}",
            'name_id' => "required|string|min:1|max:100|unique:products,name_id,{$this->product->id}",
            'name_zh' => "required|string|min:1|max:100|unique:products,name_zh,{$this->product->id}",
            'image' => 'nullable|image|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
            'file_coa' => 'nullable|file|max:'.env('MAX_FILE').'|mimes:'.env('MIMES_FILE'),
            'file_msds' => 'nullable|file|max:'.env('MAX_FILE').'|mimes:'.env('MIMES_FILE'),
        ];
    }

    public function submit(Product $product): Product
    {
        return (new ProductService)->update(product: $product, data: $this->validate());
    }
}
