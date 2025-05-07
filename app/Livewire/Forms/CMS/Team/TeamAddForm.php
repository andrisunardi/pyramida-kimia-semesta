<?php

namespace App\Livewire\Forms\CMS\Team;

use App\Models\Team;
use App\Services\TeamService;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class TeamAddForm extends Form
{
    #[Validate('required|string|min:1|max:50|unique:teams,name')]
    public string $name = '';

    #[Validate('required|string|min:1|max:50')]
    public string $job = '';

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

    public function submit(): Team
    {
        return (new TeamService)->create(data: $this->validate());
    }
}
