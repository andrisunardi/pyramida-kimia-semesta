<?php

namespace App\Livewire\Forms\CMS\History;

use App\Models\History;
use App\Services\HistoryService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class HistoryEditForm extends Form
{
    public History $history;

    public string $name = '';

    public string $name_id = '';

    public string $name_zh = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description_id = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description_zh = '';

    #[Validate('required|boolean')]
    public bool $is_active = true;

    public function set(History $history): void
    {
        $this->history = $history;
        $this->name = $history->name;
        $this->name_id = $history->name_id;
        $this->name_zh = $history->name_zh;
        $this->description = $history->description;
        $this->description_id = $history->description_id;
        $this->description_zh = $history->description_zh;
        $this->is_active = $history->is_active;
    }

    public function rules(): array
    {
        return [
            'name' => "required|string|min:1|max:100|unique:histories,name,{$this->history->id}",
            'name_id' => "required|string|min:1|max:100|unique:histories,name_id,{$this->history->id}",
            'name_zh' => "required|string|min:1|max:100|unique:histories,name_zh,{$this->history->id}",
        ];
    }

    public function submit(History $history): History
    {
        return (new HistoryService)->update(history: $history, data: $this->validate());
    }
}
