<?php

namespace App\Livewire\Forms\CMS\Partner;

use App\Models\Partner;
use App\Services\PartnerService;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class PartnerEditForm extends Form
{
    public Partner $partner;

    public string $name = '';

    public string $name_id = '';

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

    public function set(Partner $partner): void
    {
        $this->partner = $partner;
        $this->name = $partner->name;
        $this->name_id = $partner->name_id;
        $this->name_zh = $partner->name_zh;
        $this->description = $partner->description;
        $this->description_id = $partner->description_id;
        $this->description_zh = $partner->description_zh;
        $this->link = $partner->link;
        $this->is_active = $partner->is_active;
    }

    public function rules(): array
    {
        return [
            'name' => "required|string|min:1|max:100|unique:partners,name,{$this->partner->id}",
            'name_id' => "required|string|min:1|max:100|unique:partners,name_id,{$this->partner->id}",
            'name_zh' => "required|string|min:1|max:100|unique:partners,name_zh,{$this->partner->id}",
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
        ];
    }

    public function submit(Partner $partner): Partner
    {
        return (new PartnerService)->update(partner: $partner, data: $this->validate());
    }
}
