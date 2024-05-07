<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Models\Employees;
use App\Models\User;
use App\Models\Companies; // Add the Companies model

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
        $response = $this->actingAs($this->user)->get(route('employees.index' ,['locale' =>  'en' ]));
        $response->assertStatus(200);
        $response->assertSee(__('not data found'));
    }

    public function test_table_data_show_in_employees()
    {
        // Create a company record
        $company = Companies::create([
            'name' => 'web mavens',
        ]);

        // Create an employee record associated with the company
        $employees = Employees::create([
            'first_name' => 'sandip',
            'last_name' => 'sonagra',
            'email' => 'sandip@gmail.com',
            'phone' => 123456,
            'companies_id' => $company->id, // Use the created company's ID
        ]);

        // Ensure that the data is shown in the employees table
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
        $last_employees =  $employees->last();

        $response = $this->actingAs($this->user)->get(route('employees.index', ['locale' => 'en']));

        $response->assertStatus(200);
        $response->assertDontSee(__('not data found'));

        $response->assertViewHas('employees', function ($collection) use ($last_employees) {
            return $collection->contains($last_employees);
        });
    }

    public function test_create_employees_successfully()
    {
        //create companies
        $company = Companies::create([
            'name' => 'web mavens',
        ]);
        //  create employees
        $employees = Employees::create([
            'first_name' => 'sandip',
            'last_name' => 'sonagra',
            'email' => 'sandip@gmail.com',
            'phone' => 123456,
            'companies_id' => $company->id, // Use the created company's ID
        ]);

        $response = $this->actingAs($this->user)->from(route('employees.create'))->post(route('employees.store'), [
            'first_name' => $employees->first_name,
            'last_name' => $employees->last_name,
            'email' =>$employees->email,
            'phone' =>$employees->phone,
            'companies_id' => $employees->companies_id,
        ]);
        $last_employees = Employees::latest()->first();
        $this->assertEquals(1, Employees::count());
        $this->assertEquals($employees->first_name, $last_employees->first_name);
        $this->assertEquals($employees->email, $last_employees->email);
        $this->assertEquals($employees->phone, $last_employees->phone);
    }

    public function test_edit_employees_data()
    {
        $employee = Employees::factory()->create();

        $response = $this->actingAs($this->user)->get(route('employees.edit', ['locale' => 'en', 'employee' => $employee->id]));

        $response->assertStatus(200);
        $response->assertSee('value="' . $employee->first_name . '"', false);
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
