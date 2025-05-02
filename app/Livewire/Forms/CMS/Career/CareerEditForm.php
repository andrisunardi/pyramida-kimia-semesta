<?php

namespace App\Livewire\Forms\CMS\Career;

use App\Models\Career;
use App\Services\CareerService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CareerEditForm extends Form
{
    public Career $career;

    public string $name = '';

    public string $name_id = '';

    public string $name_zh = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description_id = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description_zh = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public ?string $location = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public ?string $location_id = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public ?string $location_zh = '';

    #[Validate('nullable|url|min:1|max:100')]
    public string $link = '';

    #[Validate('required|boolean')]
    public bool $is_active = true;

    public function set(Career $career): void
    {
        $this->career = $career;
        $this->name = $career->name;
        $this->name_id = $career->name_id;
        $this->name_zh = $career->name_zh;
        $this->description = $career->description;
        $this->description_id = $career->description_id;
        $this->description_zh = $career->description_zh;
        $this->location = $career->location;
        $this->location_id = $career->location_id;
        $this->location_zh = $career->location_zh;
        $this->link = $career->link;
        $this->is_active = $career->is_active;
    }

    public function rules(): array
    {
        return [
            'name' => "required|string|min:1|max:100|unique:careers,name,{$this->career->id}",
            'name_id' => "required|string|min:1|max:100|unique:careers,name_id,{$this->career->id}",
            'name_zh' => "required|string|min:1|max:100|unique:careers,name_zh,{$this->career->id}",
        ];
    }

    public function submit(Career $career): Career
    {
        return (new CareerService)->update(career: $career, data: $this->validate());
    }
}
