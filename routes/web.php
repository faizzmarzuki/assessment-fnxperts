<?php
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('companies.index'));

Route::middleware('auth')->group(function () {
    Route::get('dashboard', fn() => redirect()->route('companies.index'))->name('dashboard');
    Route::resource('companies', CompanyController::class);
    Route::resource('employees', EmployeeController::class);
});

require __DIR__.'/auth.php';