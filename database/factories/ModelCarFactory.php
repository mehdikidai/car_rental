<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\ModelCar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ModelCar>
 */
class ModelCarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $models = ['B10', 'B11', 'B12', 'B13', 'B14', 'B15', 'B16', 'B17', 'B18', 'B19', 'B20', 'B21'];

        return [
            'name' => strtolower($this->faker->unique()->randomElement($models)),
            'company_id' => Company::all()->random()->id
        ];
    }
}
