<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\State>
 */
class StateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'symbol' => $this->faker->stateAbbr(),
            'name' => $this->faker->state(),
            'is_active' => $this->faker->boolean(80), // 80% chance of being active
            'investment_facilities' => $this->faker->numberBetween(1, 10),
            'education_rank' => $this->faker->numberBetween(1, 10),
            'tourism' => $this->faker->numberBetween(1, 10),
            'jobs_and_business' => $this->faker->numberBetween(1, 10),
            'accommodation' => $this->faker->numberBetween(1, 10),
        ];
    }
}
