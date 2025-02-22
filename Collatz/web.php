<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollatzController;

Route::get('/collatz/{number}', [CollatzController::class, 'input']);
