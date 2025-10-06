<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faq>
 */
class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question_en' => $this->faker->sentence() . '?',
            'question_fa' => $this->faker->sentence() . '؟',
            'answer_en' => $this->faker->paragraph(),
            'answer_fa' => $this->faker->paragraph(),
        ];
    }
}
