<?php


namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Car;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Gate;

class CarControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the index method for admin users.
     */
    public function test_index_displays_car_list_for_admin()
    {

        $admin = User::factory()->create(['is_admin' => 1]);


        $this->actingAs($admin);


        Car::factory(2)->create();


        $response = $this->get(route('backend.cars'));


        $response->assertStatus(200);
        $response->assertViewHas('cars');
        
    }

    /**
     * Test the store method.
     */
}
