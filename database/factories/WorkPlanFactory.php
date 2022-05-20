<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkPlan>
 */
class WorkPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'plan' => $this->faker->word(),
            'description' => $this->faker->text(),
            'icon' => $this->faker->imageUrl(50, 50, 'animals', true),
        ];
    }
}
