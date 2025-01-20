<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'task_title' => $this->faker->word,
            'task_description' => $this->faker->sentence,
            'submission_deadline' => $this->faker->date,
            'completed' => false,
        ];
    }
}
