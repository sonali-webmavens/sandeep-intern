<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
    public function test_user_login_with_email_and_password(){
        $user = User::factory()->create();
        $this->post('login',[
            'email'=>$user->email,
            'password'=>'password',
        ]);
        $this->assertAuthenticated();
    }
}
