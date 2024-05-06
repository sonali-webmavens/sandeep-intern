<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Models\Employees;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\WithFaker;
// use PHPUnit\Framework\TestCase;

class EmployeesUnitTest extends TestCase
{
    use RefreshDatabase,WithFaker;
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = $this->UserCreate();
    }

    public function test_table_data_do_not_show_in_employees()
    {
        $response = $this->actingAs($this->user)->get(route('employees.index', ['locale' => 'en']));

        $response->assertStatus(200);
        $response->assertSee(__('not data found'));
    }

    public function test_table_data_show_in_employees()
    {
        $employees = Employees::create([
            'name' => 'sandip',
            'email' => 'sandip@gmail.com',
            'website' => 'sandip.com',
            'logo' => 'myphoto',
        ]);

        $response = $this->actingAs($this->user)->get(route('employees.index', ['locale' => 'en']));

        $response->assertStatus(200);
        $response->assertDontSee(__('not data found'));

        $response->assertViewHas('employees', function ($collection) use ($employees) {
            return $collection->contains($employees);
        });
    }

    public function test_table_data_show_for_pagination_in_employees()
    {
         $employees = Employees::factory()->count(10)->create();
        $last_companies =  $employees->last();

        $response = $this->actingAs($this->user)->get(route('employees.index', ['locale' => 'en']));

        $response->assertStatus(200);
        $response->assertDontSee(__('not data found'));

        $response->assertViewHas('Employees', function ($collection) use ($last_companies) {
            return $collection->contains($last_companies);
        });
    }

    public function test_create_employees_successfully()
    {
        //  create employees
        $comapnies = Employees::create([
            'name' => 'sandip',
            'email' => 'sandip@gmail.com',
            'website' => 'www.sandip.com',
        ]);

        $response = $this->actingAs($this->user)->from(route('employees.create'))->post(route('employees.store'), [
            'name' => $comapnies->name,
            'email' => $comapnies->name,
            'website' => $comapnies->name,
        ]);
        $last_employees = Employees::latest()->first();
        $this->assertEquals(1, Employees::count());
        $this->assertEquals($comapnies->name, $last_employees->name);
        $this->assertEquals($comapnies->email, $last_employees->email);
        $this->assertEquals($comapnies->website, $last_employees->website);
    }

    public function test_edit_employees_data()
    {
        $employee = Employees::factory()->create();

        $response = $this->actingAs($this->user)->get(route('employees.edit', ['locale' => 'en', 'employee' => $employee->id]));

        $response->assertStatus(200);
        $response->assertSee('value="' . $employee->name . '"', false);
    }

    // public function test_update_time_validation_redirect_back()
    // {
    //     $company = Employees::factory()->create();

    //     $response = $this->actingAs($this->user)
    //         ->from(route('employees.edit', ['locale' => 'en', 'company' => $company->id]))
    //         ->put(route('employees.update', ['locale' => 'en', 'company' => $company->id]), [
    //             'name' => '',
    //         ]);
    //     // $response->assertStatus(302);
    //     $response->assertRedirect(route('employees.edit', ['locale' => 'en', 'company' => $company->id]));
    //     // $response->assertSessionHasErrors(['name']);
    // }


    private function UserCreate()
    {
        $user = User::factory()->create();
        return $user;
    }
}
