<?php

namespace App\Livewire\Forms\CMS\Article;

use App\Models\Article;
use App\Services\ArticleService;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class ArticleEditForm extends Form
{
    public Article $article;

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
    public ?string $tags = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public ?string $tags_id = '';

    #[Validate('nullable|string|min:1|max:65535')]
    public ?string $tags_zh = '';

    #[Validate('nullable|date|date_format:Y-m-d')]
    public string $date = '';

    public ?TemporaryUploadedFile $image = null;

    #[Validate('required|boolean')]
    public bool $is_active = true;

    public function set(Article $article): void
    {
        $this->article = $article;
        $this->name = $article->name;
        $this->name_id = $article->name_id;
        $this->name_zh = $article->name_zh;
        $this->description = $article->description;
        $this->description_id = $article->description_id;
        $this->description_zh = $article->description_zh;
        $this->tags = $article->tags;
        $this->tags_id = $article->tags_id;
        $this->tags_zh = $article->tags_zh;
        $this->date = $article->date?->toDateString();
        $this->is_active = $article->is_active;
    }

    public function rules(): array
    {
        return [
            'name' => "required|string|min:1|max:100|unique:articles,name,{$this->article->id}",
            'name_id' => "required|string|min:1|max:100|unique:articles,name_id,{$this->article->id}",
            'name_zh' => "required|string|min:1|max:100|unique:articles,name_zh,{$this->article->id}",
            'image' => 'nullable|max:'.env('MAX_IMAGE').'|mimes:'.env('MIMES_IMAGE'),
        ];
    }

    public function submit(Article $article): Article
    {
        return (new ArticleService)->update(article: $article, data: $this->validate());
    }
}
