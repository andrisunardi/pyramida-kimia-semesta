<?php

namespace App\Livewire\Forms\CMS\Slider;

use App\Models\Slider;
use App\Services\SliderService;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class SliderEditForm extends Form
{
    public Slider $slider;

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

    public function set(Slider $slider): void
    {
        $this->slider = $slider;
        $this->name = $slider->name;
        $this->name_id = $slider->name_id;
        $this->name_zh = $slider->name_zh;
        $this->description = $slider->description;
        $this->description_id = $slider->description_id;
        $this->description_zh = $slider->description_zh;
        $this->is_active = $slider->is_active;
    }

    public function rules(): array
    {
        return [
            'name' => "required|string|min:1|max:100|unique:sliders,name,{$this->slider->id}",
            'name_id' => "required|string|min:1|max:100|unique:sliders,name_id,{$this->slider->id}",
            'name_zh' => "required|string|min:1|max:100|unique:sliders,name_zh,{$this->slider->id}",
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
        ];
    }

    public function submit(Slider $slider): Slider
    {
        return (new SliderService)->update(slider: $slider, data: $this->validate());
    }
}
