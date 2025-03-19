<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FaqFactory extends Factory
{
    public function definition(): array
    {
        return [
            'question' => fake()->unique()->sentence(),
            'question_id' => fake()->unique()->sentence(),
            'question_zh' => fake()->unique()->sentence(),
            'answer' => fake()->paragraph(),
            'answer_id' => fake()->paragraph(),
            'answer_zh' => fake()->paragraph(),
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
