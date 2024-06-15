<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Company;
use App\Models\ModelCar;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        User::factory()->create([
            'name' => 'mehdi kidai',
            'email' => 'mehdikidai@gmail.com',
            'password' => Hash::make('123456789')
        ]);

        Company::factory(7)->create();
        
        ModelCar::factory(10)->create();

        User::factory(10)->create();


        Car::factory()->count(90)->create();
    }
}
