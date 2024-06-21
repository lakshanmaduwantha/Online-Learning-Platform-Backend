<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EnrollmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::resource('courses', CourseController::class);

// Route::resource('users', UserController::class);

// Route::resource('enrollments', EnrollmentController::class);

// Route::get('users/{user}/enrollments', [UserController::class, 'enrollments'])->name('users.enrollments');