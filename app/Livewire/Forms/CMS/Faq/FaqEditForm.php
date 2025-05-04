<?php

namespace App\Livewire\Forms\CMS\Faq;

use App\Models\Faq;
use App\Services\FaqService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FaqEditForm extends Form
{
    public Faq $faq;

    public string $question = '';

    public string $question_id = '';

    public string $question_zh = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $answer = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $answer_id = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $answer_zh = '';

    #[Validate('required|boolean')]
    public bool $is_active = true;

    public function set(Faq $faq): void
    {
        $this->faq = $faq;
        $this->question = $faq->question;
        $this->question_id = $faq->question_id;
        $this->question_zh = $faq->question_zh;
        $this->answer = $faq->answer;
        $this->answer_id = $faq->answer_id;
        $this->answer_zh = $faq->answer_zh;
        $this->is_active = $faq->is_active;
    }

    public function rules(): array
    {
        return [
            'question' => "required|string|min:1|max:100|unique:faqs,question,{$this->faq->id}",
            'question_id' => "required|string|min:1|max:100|unique:faqs,question_id,{$this->faq->id}",
            'question_zh' => "required|string|min:1|max:100|unique:faqs,question_zh,{$this->faq->id}",
        ];
    }

    public function submit(Faq $faq): Faq
    {
        return (new FaqService)->update(faq: $faq, data: $this->validate());
    }
}
