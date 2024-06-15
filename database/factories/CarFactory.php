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
            'photo'=>'https://platform.cstatic-images.com/medium/in/v2/stock_photos/c994db3e-7022-4dce-b995-c7c7626e7aad/ab3938b6-1428-4082-866a-501b224b9db9.png'
        ];
    }
}
