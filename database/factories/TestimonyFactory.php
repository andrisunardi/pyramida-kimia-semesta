<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'company' => fake()->company(),
            'message' => fake()->paragraph(),
            'message_id' => fake()->paragraph(),
            'message_zh' => fake()->paragraph(),
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
