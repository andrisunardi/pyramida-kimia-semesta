<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductCategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->name();

        return [
            'name' => $name,
            'name_id' => fake()->unique()->name(),
            'name_zh' => fake()->unique()->name(),
            'description' => fake()->paragraph(),
            'description_id' => fake()->paragraph(),
            'description_zh' => fake()->paragraph(),
            'image' => null,
            'slug' => Str::slug($name),
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
                public_path("images/product/category/{$image}"),
            );

            return [
                'image' => $image,
            ];
        });
    }
}
