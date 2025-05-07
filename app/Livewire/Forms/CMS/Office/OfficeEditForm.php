<?php

namespace App\Livewire\Forms\CMS\Office;

use App\Models\Office;
use App\Services\OfficeService;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class OfficeEditForm extends Form
{
    public Office $office;

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

    public function set(Office $office): void
    {
        $this->office = $office;
        $this->name = $office->name;
        $this->address = $office->address;
        $this->maps = $office->maps;
        $this->phone = $office->phone;
        $this->is_active = $office->is_active;
    }

    public function rules(): array
    {
        return [
            'name' => "required|string|min:1|max:50|unique:offices,name,{$this->office->id}",
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
        ];
    }

    public function submit(Office $office): Office
    {
        return (new OfficeService)->update(office: $office, data: $this->validate());
    }
}
