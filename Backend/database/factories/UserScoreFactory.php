<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserScore>
 */
class UserScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name();
        $address = $this->faker->address();
        $age = $this->faker->numberBetween(10, 30);

        return [
            'name' => $name,
            'address' => $address,
            'points' => 0,
            'age' => $age
        ];
    }
}
