<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 4; $i++) {
            Article::create([
                'name' => "Article {$i}",
                'name_id' => "Artikel {$i}",
                'name_zh' => "文章 {$i}",
                'description' => "Article {$i}",
                'description_id' => "Artikel {$i}",
                'description_zh' => "文章 {$i}",
                'tags' => ["Article {$i}"],
                'tags_id' => ["Artikel {$i}"],
                'tags_zh' => ["文章 {$i}"],
                'date' => '2024-12-11',
                'image' => "article-{$i}.png",
                'is_active' => true,
            ]);
        }
    }
}
