<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test login with valid credentials.
     */
    public function test_login_with_valid_credentials()
    {

        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
            'is_admin' => false,
        ]);

        $response = $this->post('/login', [
            'email_x' => 'test@example.com',
            'password_x' => 'password123',
        ]);

        $response->assertRedirect(route('frontend.home'));
        $this->assertAuthenticatedAs($user);

    }

    /**
     * Test login with invalid credentials.
     */
    public function test_login_with_invalid_credentials()
    {

        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);


        $response = $this->post('/login', [
            'email_x' => 'test@example.com',
            'password_x' => 'wrongpassword',
        ]);


        $response->assertSessionHas('error', 'test');
        $this->assertGuest();

        $user->delete();
    }

    /**
     * Test login as an admin.
     */
    public function test_login_as_admin_redirects_to_backend()
    {

        $admin = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => bcrypt('adminpassword'),
            'is_admin' => true,
        ]);


        $response = $this->post('/login', [
            'email_x' => 'admin@example.com',
            'password_x' => 'adminpassword',
        ]);

        $response->assertRedirect(route('frontend.home'));
        $this->assertAuthenticatedAs($admin);


    }
}

