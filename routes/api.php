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

    // Routes accessible only to admins (CRUD operations)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('courses', CourseController::class);
});

    // Admin-only routes
    Route::middleware('admin')->group(function () {
        Route::resource('courses', CourseController::class);
        Route::resource('enrollments', EnrollmentController::class);
        Route::resource('users', UserController::class);

    });

    Route::middleware(['auth'])->group(function () {
        Route::get('courses', [CourseController::class, 'index']);
    });

        // Student and admin routes
    Route::resource('courses', CourseController::class);
    Route::get('users/{user}/enrollments', [UserController::class, 'enrollments'])->name('users.enrollments');
});
