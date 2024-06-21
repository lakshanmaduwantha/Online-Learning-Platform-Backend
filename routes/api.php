<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // // Admin-only routes
    // Route::middleware('admin')->group(function () {
    //     Route::resource('courses', CourseController::class);
    // });

    // Student and admin routes
    Route::resource('courses', CourseController::class);
    Route::resource('users', UserController::class);
    Route::resource('enrollments', EnrollmentController::class);
    Route::get('users/{user}/enrollments', [UserController::class, 'enrollments'])->name('users.enrollments');
});
