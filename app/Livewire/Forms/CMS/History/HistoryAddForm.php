<?php

namespace App\Livewire\Forms\CMS\History;

use App\Models\History;
use App\Services\HistoryService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class HistoryAddForm extends Form
{
    #[Validate('required|string|min:1|max:100|unique:histories,name')]
    public string $name = '';

    #[Validate('required|string|min:1|max:100|unique:histories,name_id')]
    public string $name_id = '';

    #[Validate('required|string|min:1|max:100|unique:histories,name_zh')]
    public string $name_zh = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description_id = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description_zh = '';

    #[Validate('required|boolean')]
    public bool $is_active = true;

    public function submit(): History
    {
        return (new HistoryService)->create(data: $this->validate());
    }
}
