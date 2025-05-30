<?php

namespace App\Livewire\Forms\CMS\Testimony;

use App\Models\Testimony;
use App\Services\TestimonyService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TestimonyEditForm extends Form
{
    public Testimony $testimony;

    #[Validate('required|string|min:1|max:50')]
    public string $name = '';

    #[Validate('required|string|min:1|max:50')]
    public string $company = '';

    #[Validate('required|string|min:1|max:1000')]
    public string $message = '';

    #[Validate('required|string|min:1|max:1000')]
    public string $message_id = '';

    #[Validate('required|string|min:1|max:1000')]
    public string $message_zh = '';

    #[Validate('required|boolean')]
    public bool $is_active = true;

    public function set(Testimony $testimony): void
    {
        $this->testimony = $testimony;
        $this->name = $testimony->name;
        $this->company = $testimony->company;
        $this->message = $testimony->message;
        $this->message_id = $testimony->message_id;
        $this->message_zh = $testimony->message_zh;
        $this->is_active = $testimony->is_active;
    }

    public function submit(Testimony $testimony): Testimony
    {
        return (new TestimonyService)->update(testimony: $testimony, data: $this->validate());
    }
}
