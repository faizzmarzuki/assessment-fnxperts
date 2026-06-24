<?php
use App\Http\Controllers\Api\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/companies/{company}', [CompanyController::class, 'show']);