<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\DashbordController;
use App\Livewire\CustomerCreate;
use App\Livewire\CustomerEdit;
use App\Livewire\CustomerData;
use App\Livewire\CustomerView;


use Illuminate\Support\Facades\Route;

Route::get('/live', function () {
    return view('live');
});
Route::get('/editlive/{editid}', function ($editid) {
    return view('edit_live', ['editid' => $editid]);
})->name('customer.edit');

Route::get('/customer', [CustomerCreate::class, 'save'])->name('customer.create');
Route::get('/customer/show', CustomerData::class)->name('customer.show');
Route::get('/customer/view/{viewid}', CustomerView::class)->name('customer.view');
// Route::get('/customer/edit/{editid}', CustomerEdit::class)->name('customer.edit');
Auth::routes();

Route::group(['middleware' => ['auth'], 'prefix' => '{locale?}'], function () {
    Route::resource('/companies', CompaniesController::class);
    Route::post('/companies', [CompaniesController::class, 'store'])->name('companies.store');

    Route::resource('/employees', EmployeesController::class);
    Route::delete('/employees/{employee}', [EmployeesController::class, 'destroy'])->name('employees.destroy');

    Route::get('/', [DashbordController::class, 'index'])->name('dashboard.index');

    Route::get('/create', [DashbordController::class, 'create'])->name('dashboard.create');
});
