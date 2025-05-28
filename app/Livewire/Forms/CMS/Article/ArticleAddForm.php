<?php

namespace App\Livewire\Forms\CMS\Article;

use App\Models\Article;
use App\Services\ArticleService;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class ArticleAddForm extends Form
{
    #[Validate('required|string|min:1|max:100|unique:articles,name')]
    public string $name = '';

    #[Validate('required|string|min:1|max:100|unique:articles,name_id')]
    public string $name_id = '';

    #[Validate('required|string|min:1|max:100|unique:articles,name_zh')]
    public string $name_zh = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description_id = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $description_zh = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $tags = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $tags_id = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public string $tags_zh = '';

    #[Validate('required|date|date_format:Y-m-d')]
    public string $date = '';

    public ?TemporaryUploadedFile $image = null;

    #[Validate('required|boolean')]
    public bool $is_active = true;

    public function set(): void
    {
        $this->date = now()->today()->toDateString();
    }

    public function rules(): array
    {
        return [
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
        ];
    }

    public function submit(): Article
    {
        return (new ArticleService)->create(data: $this->validate());
    }
}
