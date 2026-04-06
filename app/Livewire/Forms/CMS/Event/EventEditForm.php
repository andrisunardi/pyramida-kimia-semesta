<?php

namespace App\Livewire\Forms\CMS\Event;

use App\Models\Event;
use App\Services\EventService;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class EventEditForm extends Form
{
    public Event $event;

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

    public ?TemporaryUploadedFile $video = null;

    #[Validate('required|boolean')]
    public bool $is_active = true;

    public function set(Event $event): void
    {
        $this->event = $event;
        $this->name = $event->name;
        $this->name_id = $event->name_id;
        $this->name_zh = $event->name_zh;
        $this->description = $event->description;
        $this->description_id = $event->description_id;
        $this->description_zh = $event->description_zh;
        $this->is_active = $event->is_active;
    }

    public function rules(): array
    {
        return [
            'name' => "required|string|min:1|max:100|unique:events,name,{$this->event->id}",
            'name_id' => "required|string|min:1|max:100|unique:events,name_id,{$this->event->id}",
            'name_zh' => "required|string|min:1|max:100|unique:events,name_zh,{$this->event->id}",
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
            'video' => 'nullable|max:'.env('MAX_VIDEO').'|mimes:'.env('MIMES_VIDEO'),
        ];
    }

    public function submit(Event $event): Event
    {
        return (new EventService)->update(event: $event, data: $this->validate());
    }
}
