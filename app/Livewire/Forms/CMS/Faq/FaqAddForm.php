<?php

namespace App\Livewire\Forms\CMS\Faq;

use App\Models\Faq;
use App\Services\FaqService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FaqAddForm extends Form
{
    #[Validate('required|string|min:1|max:100|unique:faqs,question')]
    public string $question = '';

    #[Validate('required|string|min:1|max:100|unique:faqs,question_id')]
    public string $question_id = '';

    #[Validate('required|string|min:1|max:100|unique:faqs,question_zh')]
    public string $question_zh = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $answer = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $answer_id = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $answer_zh = '';

    #[Validate('required|boolean')]
    public bool $is_active = true;

    public function submit(): Faq
    {
        return (new FaqService)->create(data: $this->validate());
    }
}
