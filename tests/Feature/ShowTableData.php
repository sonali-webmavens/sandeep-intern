<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware; // Import WithoutMiddleware

class ShowTableData extends TestCase
{
    // use RefreshDatabase, WithoutMiddleware;


     // public function test_companies()
    // {
    //     $response = $this->get('/companies');
    //     $response->assertStatus(302);
    //     $response = $this->get($response->headers->get('Location'));
    //     $response->assertStatus(200);
    // }
    // public function test_user_login_after_add_companies()
    // {
    //     $user = User::factory()->create([
    //         "name" => "admin",
    //         "email" => "admin@admin.com",
    //         "password" => bcrypt("password"),
    //     ]);

    //     // Login user
    //     $response = $this->post('login', [
    //         'email' => $user->email,
    //         'password' => 'password',
    //     ]);
    //     $this->assertAuthenticated();

    //     //create companies
    //     $comapnies = Companies::create([
    //         'name' => 'sandip',
    //         'email' => 'sandip@gmail.com',
    //         'website' => 'www.sandip.com',
    //         ]);

    //         $response = $this->from(route('companies.create'))->post(route('companies.store'), [
    //             'name' => $comapnies->name,
    //             'email' => $comapnies->name,
    //             'website' => $comapnies->name,
    //         ]);


    //     $this->assertEquals(1, Companies::count());

    //     }
}
