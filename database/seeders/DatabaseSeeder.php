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
            'name' => 'imane imane',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'is_admin' => 1
        ]);



        Company::factory(7)->create();
        ModelCar::factory(10)->create();
        $users = User::factory(19)->create();

        // start create customer -----------
        
        Customer::factory()->create([
            'user_id' => 1
        ]);

        $users->each(function ($user) {
            echo $user->id; 
            Customer::factory()->create([
                'user_id' => $user->id
            ]);
        });


        // end create customer -----------


        Car::factory()->count(50)->create();

    }
}
