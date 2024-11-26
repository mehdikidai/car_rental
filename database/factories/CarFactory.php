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
            'company_id' => Company::query()->inRandomOrder()->first()->id ?? Company::factory()->create()->id,
            'model_id' => ModelCar::query()->inRandomOrder()->first()->id ?? ModelCar::factory()->create()->id,
            'year' => $this->faker->year,
            'rental_price' => $this->faker->randomFloat(0, 400, 1000),
            'description' => $this->faker->paragraph,
            'photo' => $this->faker->randomElement(['default.webp','1.png','2.png','3.png','4.png','5.png','6.png','7.png','8.png']),
            'doors' => "4",
            'transmission' => $this->faker->randomElement(['auto', 'manual']),
        ];
    }



    // private $cars = [
    //     'https://platform.cstatic-images.com/medium/in/v2/stock_photos/c994db3e-7022-4dce-b995-c7c7626e7aad/ab3938b6-1428-4082-866a-501b224b9db9.png',
    //     'https://platform.cstatic-images.com/medium/in/v2/stock_photos/607e07e8-c829-4ec3-ba7a-20771f79bd64/e86ac423-47a9-4dd6-a83f-888431ed12aa.png',
    //     'https://platform.cstatic-images.com/medium/in/v2/stock_photos/0b86a23a-a3e2-476d-b459-4fa8ac478fa1/72670da9-7623-457c-8be7-e7c0254487d9.png',
    //     'https://platform.cstatic-images.com/medium/in/v2/stock_photos/7d5477ea-c625-467d-b978-9b4dbb062200/88342e72-0214-4b72-b286-86a4c90fbbec.png',
    //     'https://platform.cstatic-images.com/medium/in/v2/stock_photos/7858f52d-9410-4cad-b704-64f90206cd7a/a9d17b8a-81da-4f2c-a2ee-213e98d9107a.png',
    //     'https://platform.cstatic-images.com/medium/in/v2/stock_photos/8424d05c-6676-4400-ab43-f5696b3ebfc1/0931b663-7dc2-4930-8f4d-4632f03bdc38.png',
    //     'https://platform.cstatic-images.com/medium/in/v2/stock_photos/6385f241-b6dc-4289-a89d-e696bf1e3575/8b8c957f-1e23-4761-975e-5ea3672e71f7.png',
    //     'https://platform.cstatic-images.com/medium/in/v2/stock_photos/25329da1-2221-42cc-a416-f733432c8f50/ccd48adf-4303-4021-b113-60c49d4003c3.png'
    // ];
}
