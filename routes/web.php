<?php
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\DashbordController;



use Illuminate\Support\Facades\Route;


Route::resource('/', DashbordController::class);



Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('companies', CompaniesController::class);

    Route::resource('employees', EmployeesController::class);
});