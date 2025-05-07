<?php

namespace App\Livewire\Forms\CMS\Partner;

use App\Models\Partner;
use App\Services\PartnerService;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class PartnerAddForm extends Form
{
    #[Validate('required|string|min:1|max:100|unique:partners,name')]
    public string $name = '';

    #[Validate('required|string|min:1|max:100|unique:partners,name_id')]
    public string $name_id = '';

    #[Validate('required|string|min:1|max:100|unique:partners,name_zh')]
    public string $name_zh = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description_id = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description_zh = '';

    #[Validate('nullable|url|min:1|max:100')]
    public string $link = '';

    public ?TemporaryUploadedFile $image = null;

    #[Validate('required|boolean')]
    public bool $is_active = true;

    public function rules(): array
    {
        return [
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
        ];
    }

    public function submit(): Partner
    {
        return (new PartnerService)->create(data: $this->validate());
    }
}
