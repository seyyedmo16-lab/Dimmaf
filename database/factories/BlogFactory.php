<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'state_id' => \App\Models\State::factory(),
            'title_en' => $this->faker->sentence(),
            'title_fa' => $this->faker->sentence(),
            'body_en' => $this->faker->paragraphs(3, true),
            'body_fa' => $this->faker->paragraphs(3, true),
            'is_deleted' => false,
            'link' => $this->faker->url(),
        ];
    }
}
