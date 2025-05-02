<?php

namespace App\Livewire\Forms\CMS\Career;

use App\Models\Career;
use App\Services\CareerService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CareerAddForm extends Form
{
    #[Validate('required|string|min:1|max:100|unique:careers,name')]
    public string $name = '';

    #[Validate('required|string|min:1|max:100|unique:careers,name_id')]
    public string $name_id = '';

    #[Validate('required|string|min:1|max:100|unique:careers,name_zh')]
    public string $name_zh = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description_id = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description_zh = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $location = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $location_id = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $location_zh = '';

    #[Validate('nullable|url|min:1|max:100')]
    public string $link = '';

    #[Validate('required|boolean')]
    public bool $is_active = true;

    public function submit(): Career
    {
        return (new CareerService)->create(data: $this->validate());
    }
}
