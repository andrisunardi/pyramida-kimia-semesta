<?php

namespace App\Livewire\Forms\CMS\CareerBenefit;

use App\Models\CareerBenefit;
use App\Services\CareerBenefitService;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class CareerBenefitEditForm extends Form
{
    public CareerBenefit $careerBenefit;

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

    public function set(CareerBenefit $careerBenefit): void
    {
        $this->careerBenefit = $careerBenefit;
        $this->name = $careerBenefit->name;
        $this->name_id = $careerBenefit->name_id;
        $this->name_zh = $careerBenefit->name_zh;
        $this->description = $careerBenefit->description;
        $this->description_id = $careerBenefit->description_id;
        $this->description_zh = $careerBenefit->description_zh;
        $this->is_active = $careerBenefit->is_active;
    }

    public function rules(): array
    {
        return [
            'name' => "required|string|min:1|max:100|unique:career_benefits,name,{$this->careerBenefit->id}",
            'name_id' => "required|string|min:1|max:100|unique:career_benefits,name_id,{$this->careerBenefit->id}",
            'name_zh' => "required|string|min:1|max:100|unique:career_benefits,name_zh,{$this->careerBenefit->id}",
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
        ];
    }

    public function submit(CareerBenefit $careerBenefit): CareerBenefit
    {
        return (new CareerBenefitService)->update(careerBenefit: $careerBenefit, data: $this->validate());
    }
}
