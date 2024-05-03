<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        // Send a GET request to the URL
        $response = $this->get(url("/"));

        // Assert that the initial response status is a redirect (302)
        $response->assertStatus(302);

        // Follow the redirect
        $response = $this->get($response->headers->get('Location'));

        // Assert that the final response status is 200
        $response->assertStatus(200);
    }
}
