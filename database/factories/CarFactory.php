<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\ModelCar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => Company::all()->random()->id,
            'model_id' => ModelCar::all()->random()->id,
            'year' => $this->faker->year,
            'rental_price' => $this->faker->randomFloat(2, 20, 200),
            'description' => $this->faker->paragraph,
        ];
    }
}
