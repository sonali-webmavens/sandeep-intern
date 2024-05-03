<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware; // Import WithoutMiddleware

class CompaniesTest extends TestCase
{
    // use RefreshDatabase, WithoutMiddleware;

    /**
     * A basic unit test example.
     */
    public function test_companies_store()
    {
        $response = $this->call("POST",url("/companies"), [
            'name' => 'sandip',
            'email' => 'sandip@gmail.com',
            'website' => 'www.sandip.com',
            'logo'=> 'sandip.png',
        ]);
       $response->assertStatus(405);
        $this->assertTrue(true);
    }
}
