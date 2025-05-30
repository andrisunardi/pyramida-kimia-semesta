<?php

namespace App\Livewire\Forms\CMS\Testimony;

use App\Models\Testimony;
use App\Services\TestimonyService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TestimonyAddForm extends Form
{
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

    public function submit(): Testimony
    {
        return (new TestimonyService)->create(data: $this->validate());
    }
}
