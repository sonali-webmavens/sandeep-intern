<?php
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\DashbordController;



use Illuminate\Support\Facades\Route;


<<<<<<< Updated upstream
Route::resource('/', DashbordController::class);
=======
// Route::resource('/{lang}', DashbordController::class)->names([
//     'index'=> '/.index',
//     'create'=> '/.create',
// ]);
>>>>>>> Stashed changes



Auth::routes();

// Route::group(['middleware' => 'auth'], function () {
//     Route::resource('companies', CompaniesController::class);

//     Route::resource('employees', EmployeesController::class);
// });

//

Route::group(['middleware' => 'auth' ], function () {
    Route::resource('/companies', CompaniesController::class);
    Route::resource('/employees', EmployeesController::class);
});

// Route::group([], function () {
    Route::get('/', [DashbordController::class, 'index'])->name('dashboard.index');
    Route::get('/create', [DashbordController::class, 'create'])->name('dashboard.create');
    // Other routes...
// });
