<?php

namespace App\Livewire\Forms\CMS\Event;

use App\Models\Event;
use App\Services\EventService;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class EventAddForm extends Form
{
    #[Validate('required|string|min:1|max:100|unique:events,name')]
    public string $name = '';

    #[Validate('required|string|min:1|max:100|unique:events,name_id')]
    public string $name_id = '';

    #[Validate('required|string|min:1|max:100|unique:events,name_zh')]
    public string $name_zh = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description_id = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description_zh = '';

    public ?TemporaryUploadedFile $image = null;

    public ?TemporaryUploadedFile $video = null;

    #[Validate('required|boolean')]
    public bool $is_active = true;

    public function rules(): array
    {
        return [
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
            'video' => 'nullable|max:'.env('MAX_VIDEO').'|mimes:'.env('MIMES_VIDEO'),
        ];
    }

    public function submit(): Event
    {
        return (new EventService)->create(data: $this->validate());
    }
}
