<?php

namespace App\Livewire\Forms\CMS\Team;

use App\Models\Team;
use App\Services\TeamService;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class TeamEditForm extends Form
{
    public Team $team;

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

    public function set(Team $team): void
    {
        $this->team = $team;
        $this->name = $team->name;
        $this->job = $team->job;
        $this->description = $team->description;
        $this->description_id = $team->description_id;
        $this->description_zh = $team->description_zh;
        $this->is_active = $team->is_active;
    }

    public function rules(): array
    {
        return [
            'name' => "required|string|min:1|max:100|unique:teams,name,{$this->team->id}",
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
        ];
    }

    public function submit(Team $team): Team
    {
        return (new TeamService)->update(team: $team, data: $this->validate());
    }
}
