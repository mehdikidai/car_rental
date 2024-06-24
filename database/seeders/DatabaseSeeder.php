<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Company;
use App\Models\Customer;
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
            'password' => Hash::make('123456789'),
            'is_admin' => 1
        ]);



        Company::factory(7)->create();
        ModelCar::factory(10)->create();
        //User::factory(1)->create();
        Customer::factory(1)->create();
        Car::factory()->count(40)->create();

    }
}
