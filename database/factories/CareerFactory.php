<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CareerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->sentence(),
            'name_id' => fake()->unique()->sentence(),
            'name_zh' => fake()->unique()->sentence(),
            'description' => fake()->paragraph(),
            'description_id' => fake()->paragraph(),
            'description_zh' => fake()->paragraph(),
            'location' => fake()->city().' '.fake()->country(),
            'location_id' => fake()->city().' '.fake()->country(),
            'location_zh' => fake()->city().' '.fake()->country(),
            'link' => fake()->url(),
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
