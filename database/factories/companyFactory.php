<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class companyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $carBrands = ['Volvo', 'MG', 'Tesla', 'BMW', 'Kia', 'Audi', 'Mercedes'];
        return [
            'name' => strtolower($this->faker->unique()->randomElement($carBrands)),
        ];
    }
}
