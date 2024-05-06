<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware; // Import WithoutMiddleware

class CompaniesTest extends TestCase
{
    // use RefreshDatabase, WithoutMiddleware;

    public function test_companies()
    {
        $response = $this->get('/companies');
        $response->assertStatus(302);
        $response->assertRedirect(url('login'));

    }
    // public function test_companies_store()
    // {
    //     $response = $this->call("POST",url("/companies"), [
    //         'name' => 'sandip',
    //         'email' => 'sandip@gmail.com',
    //         'website' => 'www.sandip.com',
    //         'logo'=> 'sandip.png',
    //     ]);
    //    $response->assertStatus(405);
    //     $this->assertTrue(true);
    // }
}
