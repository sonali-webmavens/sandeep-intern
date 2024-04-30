<?php
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\LanguageController;

use Illuminate\Support\Facades\Route;

Auth::routes();



Route::group(['middleware' => ['auth'], 'prefix' => '{lang?}'], function () {
    Route::resource('/companies', CompaniesController::class);
    Route::resource('/employees', EmployeesController::class);

    Route::get('/', [DashbordController::class, 'index'])->name('dashboard.index');
    Route::get('/create', [DashbordController::class, 'create'])->name('dashboard.create');
});

Route::post('lang', [LanguageController::class,'change']);
