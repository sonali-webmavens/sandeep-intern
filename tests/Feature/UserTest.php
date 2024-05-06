<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware; // Import WithoutMiddleware

class UserTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware; // Add WithoutMiddleware trait


    // public function test_login()
    // {
    //     $response = $this->get('/login');


    //     $response->assertStatus(200);
    // }

    public function test_user_password()
    {
        //create user
        $user = User::factory()->create([

            "name" => "admin",
            "email" => "admin@admin.com",
            "password" => bcrypt("password"),
        ]);

        //login user
        $response = $this->post('login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $this->assertAuthenticated();
    }
}
