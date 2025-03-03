<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/company', [CompanyController::class, 'displayCompanies']);

Route::get('/client',[ClientController::class, 'displayClients']);