<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Employees;
use App\Models\User;
use App\Models\Companies;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\WithFaker;


class EmployeesUnitTest extends TestCase
{
    use RefreshDatabase, WithFaker;
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
        $employees = Employees::factory()->create();

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
        $last_employees = $employees->last();
        $response = $this->actingAs($this->user)->get(route('employees.index', ['locale' => 'en']));

        $response->assertStatus(200);
        $response->assertDontSee(__('not data found'));
        $response->assertViewHas('employees', function ($collection) use ($last_employees) {
            return $collection->contains($last_employees);
        });
    }

    public function test_create_employees_successfully()
    {
        $employees = Employees::factory()->create();


        $response = $this->actingAs($this->user)->from(route('employees.create'))->post(route('employees.store'), [
            'first_name' => $employees->first_name,
            'last_name' => $employees->last_name,
            'email' => $employees->email,
            'phone' => $employees->phone,
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

    public function test_update_emp()
    {
        $this->withoutMiddleware();
        $emp = Employees::factory()->create();

        $updatedName = [
            'first_name' => 'any update name',
            'last_name' => 'any upadte last name',
        ];

        $route = route('employees.update', ['locale' => 'en', 'employee' => $emp->id]);
        $response = $this->put($route, $updatedName);
        $updatedEmployee = Employees::findOrFail($emp->id);
        $this->assertEquals('any update name', $updatedEmployee->first_name);
        $this->assertEquals('any upadte last name', $updatedEmployee->last_name);

    }
    public function test_delete_employee()
    {
        $this->withoutMiddleware();
        $company = Companies::factory()->create();
        $employee = Employees::factory()->create(['companies_id' => $company->id]);
        $response = $this->actingAs($this->user)
            ->delete(route('employees.destroy', ['locale' => 'en', 'employee' => $employee->id]));

        $this->assertDatabaseMissing('employees', ['id' => $employee->id]);
    }
    private function UserCreate()
    {
        $user = User::factory()->create();
        return $user;
    }
}
