<?php
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\DashbordController;

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::group(['middleware' => ['auth'], 'prefix' => '{locale?}'], function () {
    Route::resource('/companies', CompaniesController::class);
    Route::post('/companies', [CompaniesController::class, 'store'])->name('companies.store');
    Route::put('/companies/{company}', 'CompaniesController@update');

    Route::resource('/employees', EmployeesController::class);
    Route::get('/', [DashbordController::class, 'index'])->name('dashboard.index');

    Route::get('/create', [DashbordController::class, 'create'])->name('dashboard.create');
});
