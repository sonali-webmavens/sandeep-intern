<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Companies;

class CompaniesControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_table_data_show()
    {
        $response = $this->get('/companies');

        $response->assertStatus(302);

        // Follow the redirect
        $response->assertSee(__('not data found'));
        $response = $this->get($response->headers->get('Location'));

        // Assert that the final response status is 200
        $response->assertStatus(200);

    }
}
