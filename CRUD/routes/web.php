<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::resource('students', StudentController::class)->except(['show']);


Route::get('/', function () {
    return redirect('/students');
});

Route::get('students/trashed', [StudentController::class,
'trashed'])->name('students.trashed');

Route::post('students/{id}/restore', [StudentController::class,
'restore'])->name('students.restore');

Route::delete('students/{id}/forceDelete', [StudentController::class,
'forceDelete'])->name('students.forceDelete');
