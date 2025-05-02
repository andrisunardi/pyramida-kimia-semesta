<?php

namespace App\Livewire\Forms\CMS\CareerBenefit;

use App\Models\CareerBenefit;
use App\Services\CareerBenefitService;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class CareerBenefitAddForm extends Form
{
    #[Validate('required|string|min:1|max:100|unique:career_benefits,name')]
    public string $name = '';

    #[Validate('required|string|min:1|max:100|unique:career_benefits,name_id')]
    public string $name_id = '';

    #[Validate('required|string|min:1|max:100|unique:career_benefits,name_zh')]
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

    public function submit(): CareerBenefit
    {
        return (new CareerBenefitService)->create(data: $this->validate());
    }
}
