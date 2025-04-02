<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FormController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;


Route::resource('students', StudentController::class)->except("show");

Route::get('/', function () {
    return redirect('/students');
});
Route::post('/submit-form', [FormController::class, 'submit'])->name('submit.form');
Route::resource('form', FormController::class);
Route::get('/test-email', function() {
    Mail::raw('Hello, this is a test', function ($message){
        $message->to('arizonatheythem@gmail.com')->subject('Laravel Test');
    });

    return redirect('/emailsent');
});

Route::get('/dashboard', function () {
    return redirect('../students');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('students/trashed', [StudentController::class, 'trashed'])->name('students.trashed');
    Route::get('students/create', [StudentController::class, 'create'])->name('students.create');
    Route::get('students/edit/{student}', [StudentController::class, 'edit'])->name('students.edit');
    Route::delete('students/destroy/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::post('students/restore/{id}', [StudentController::class, 'restore'])->name('students.restore');
    Route::delete('students/forceDelete/{id}', [StudentController::class, 'forceDelete'])->name('students.forceDelete');
    //ALWAYS CHECK PARAMETER NAMES!!!LINKS USE SAME PARAMS AS IN CONTROLLER FUNC DEFINITION
});

require __DIR__.'/auth.php';