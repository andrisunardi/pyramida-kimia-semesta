<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryCategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'name_id' => fake()->name(),
            'name_zh' => fake()->name(),
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
}
