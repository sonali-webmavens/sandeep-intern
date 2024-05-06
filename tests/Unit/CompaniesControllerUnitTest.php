<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;
use App\Models\Companies;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Testing\WithFaker;

use Illuminate\Support\Facades\Hash;

class CompaniesControllerUnitTest extends TestCase
{
    use RefreshDatabase,WithFaker;
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = $this->UserCreate();
    }

    public function test_table_data_do_not_show()
    {
        $response = $this->actingAs($this->user)->get(route('companies.index', ['locale' => 'en']));

        $response->assertStatus(200);
        $response->assertSee(__('not data found'));
    }

    public function test_table_data_show()
    {
        $companies = Companies::create([
            'name' => 'sandip',
            'email' => 'sandip@gmail.com',
            'website' => 'sandip.com',
            'logo' => 'myphoto',
        ]);

        $response = $this->actingAs($this->user)->get(route('companies.index', ['locale' => 'en']));

        $response->assertStatus(200);
        $response->assertDontSee(__('not data found'));

        $response->assertViewHas('companies', function ($collection) use ($companies) {
            return $collection->contains($companies);
        });
    }

    public function test_table_data_show_for_pagination()
    {
        $companies = Companies::factory()->count(10)->create();
        $last_companies = $companies->last();

        $response = $this->actingAs($this->user)->get(route('companies.index', ['locale' => 'en']));

        $response->assertStatus(200);
        $response->assertDontSee(__('not data found'));

        $response->assertViewHas('companies', function ($collection) use ($last_companies) {
            return $collection->contains($last_companies);
        });
    }

    public function test_create_companies_successfully()
    {
        //  create companies
        $comapnies = Companies::create([
            'name' => 'sandip',
            'email' => 'sandip@gmail.com',
            'website' => 'www.sandip.com',
        ]);

        $response = $this->actingAs($this->user)->from(route('companies.create'))->post(route('companies.store'), [
            'name' => $comapnies->name,
            'email' => $comapnies->name,
            'website' => $comapnies->name,
        ]);
        $last_companies = Companies::latest()->first();
        $this->assertEquals(1, Companies::count());
        $this->assertEquals($comapnies->name, $last_companies->name);
        $this->assertEquals($comapnies->email, $last_companies->email);
        $this->assertEquals($comapnies->website, $last_companies->website);
    }

    public function test_edit_companies_data()
    {
        $company = Companies::factory()->create();

        $response = $this->actingAs($this->user)->get(route('companies.edit', ['locale' => 'en', 'company' => $company->id]));

        $response->assertStatus(200);
        $response->assertSee('value="' . $company->name . '"', false);
    }

    // public function test_update_time_validation_redirect_back()
    // {
    //     $company = Companies::factory()->create();

    //     $response = $this->actingAs($this->user)
    //         ->from(route('companies.edit', ['locale' => 'en', 'company' => $company->id]))
    //         ->put(route('companies.update', ['locale' => 'en', 'company' => $company->id]), [
    //             'name' => '',
    //         ]);
    //     // $response->assertStatus(302);
    //     $response->assertRedirect(route('companies.edit', ['locale' => 'en', 'company' => $company->id]));
    //     // $response->assertSessionHasErrors(['name']);
    // }


    private function UserCreate()
    {
        $user = User::factory()->create();
        return $user;
    }
}
