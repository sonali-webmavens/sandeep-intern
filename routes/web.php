<?php
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\DashbordController;
use App\Livewire\Customer;
use Illuminate\Support\Facades\Route;


Route::get('/live', function () {
    return view('live');
});
Route::get('/customer',Customer::class);

Auth::routes();
Route::group(['middleware' => ['auth'], 'prefix' => '{locale?}'], function () {
    Route::resource('/companies', CompaniesController::class);
    Route::post('/companies', [CompaniesController::class, 'store'])->name('companies.store');

    Route::resource('/employees', EmployeesController::class);
    Route::delete('/employees/{employee}', [EmployeesController::class, 'destroy'])->name('employees.destroy');

    Route::get('/', [DashbordController::class, 'index'])->name('dashboard.index');

    Route::get('/create', [DashbordController::class, 'create'])->name('dashboard.create');
});


