<?php

namespace App\Livewire\Forms\CMS\Office;

use App\Models\Office;
use App\Services\OfficeService;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class OfficeAddForm extends Form
{
    #[Validate('required|string|min:1|max:50|unique:offices,name')]
    public string $name = '';

    #[Validate('required|string|min:1|max:1000')]
    public string $address = '';

    #[Validate('required|url|min:1|max:100')]
    public string $maps = '';

    #[Validate('required|string|min:1|max:20')]
    public string $phone = '';

    public ?TemporaryUploadedFile $image = null;

    #[Validate('required|boolean')]
    public bool $is_active = true;

    public function rules(): array
    {
        return [
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
        ];
    }

    public function submit(): Office
    {
        return (new OfficeService)->create(data: $this->validate());
    }
}
