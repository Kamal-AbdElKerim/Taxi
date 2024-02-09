<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\horaire>
 */
class routeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $cityNames = [
            'Casablanca',
            'Rabat',
            'Marrakech',
            'safi',
         
        ];
    
        return [
            'start_city' => $this->faker->randomElement($cityNames),
            'end_city' => $this->faker->randomElement($cityNames),
            // Add other attributes as needed
        ];
    }
}
