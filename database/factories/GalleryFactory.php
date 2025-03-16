<?php

namespace Database\Factories;

use App\Models\GalleryCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GalleryFactory extends Factory
{
    public function definition(): array
    {
        $galleryCategory = GalleryCategory::first() ?? GalleryCategory::factory()->create();

        return [
            'gallery_category_id' => $galleryCategory->id,
            'name' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'image' => fake()->paragraph(),
            'is_active' => fake()->boolean(),
        ];
    }

    public function active(): static
    {
        return $this->state(fn () => ['is_active' => true]);
    }

    public function inActive(): static
    {
        return $this->state(fn () => ['is_active' => false]);
    }

    public function image(): static
    {
        return $this->state(function (array $attributes) {
            $image = Str::slug($attributes['name']).'.png';

            File::copy(
                public_path('images/image.png'),
                public_path("images/gallery/{$image}"),
            );

            return [
                'image' => $image,
            ];
        });
    }
}
