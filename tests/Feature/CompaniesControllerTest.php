<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;
use App\Models\Companies;
use App\Models\User;

class CompaniesControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_table_data_do_not_show()
    {
        // Create a user
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('companies.index', ['locale' => 'en']));

        $response->assertStatus(200);
        $response->assertSee(__('not data found'));
    }

    public function test_table_data_show()
    {
        // Create a user
        $user = User::factory()->create();
        $companies = Companies::create([
            'name' => 'sandip',
            'email' => 'sandip@gmail.com',
            'website' => 'sandip.com',
            'logo' => 'myphoto',
        ]);

        $response = $this->actingAs($user)->get(route('companies.index', ['locale' => 'en']));

        $response->assertStatus(200);
        $response->assertDontSee(__('not data found'));
        // $response->assertSee('sandip');

        $response->assertViewHas('companies', function ($collection) use ($companies) {
            return $collection->contains($companies);
        });
    }
}
