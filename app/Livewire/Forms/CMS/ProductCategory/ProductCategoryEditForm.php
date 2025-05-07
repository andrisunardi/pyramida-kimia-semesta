<?php

namespace App\Livewire\Forms\CMS\ProductCategory;

use App\Models\ProductCategory;
use App\Services\ProductCategoryService;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class ProductCategoryEditForm extends Form
{
    public ProductCategory $productCategory;

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

    #[Validate('required|boolean')]
    public bool $is_active = true;

    public function set(ProductCategory $productCategory): void
    {
        $this->productCategory = $productCategory;
        $this->name = $productCategory->name;
        $this->name_id = $productCategory->name_id;
        $this->name_zh = $productCategory->name_zh;
        $this->description = $productCategory->description;
        $this->description_id = $productCategory->description_id;
        $this->description_zh = $productCategory->description_zh;
        $this->is_active = $productCategory->is_active;
    }

    public function rules(): array
    {
        return [
            'name' => "required|string|min:1|max:100|unique:product_categories,name,{$this->productCategory->id}",
            'name_id' => "required|string|min:1|max:100|unique:product_categories,name_id,{$this->productCategory->id}",
            'name_zh' => "required|string|min:1|max:100|unique:product_categories,name_zh,{$this->productCategory->id}",
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
        ];
    }

    public function submit(ProductCategory $productCategory): ProductCategory
    {
        return (new ProductCategoryService)->update(productCategory: $productCategory, data: $this->validate());
    }
}
