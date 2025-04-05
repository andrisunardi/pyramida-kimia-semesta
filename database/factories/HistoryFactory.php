<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HistoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'year' => fake()->unique()->year(),
            'name' => fake()->unique()->sentence(),
            'name_id' => fake()->unique()->sentence(),
            'name_zh' => fake()->unique()->sentence(),
            'description' => fake()->paragraph(),
            'description_id' => fake()->paragraph(),
            'description_zh' => fake()->paragraph(),
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
