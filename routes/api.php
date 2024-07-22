<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DinosaurController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('password/email', [AuthController::class, 'sendPasswordResetLink']);
Route::post('password/reset', [AuthController::class, 'resetPassword']);

// Email verification routes
Route::get('email/verify/{id}', [AuthController::class, 'verifyEmail'])->name('verification.verify');
Route::post('email/resend', [AuthController::class, 'resendVerificationEmail'])->middleware('auth:sanctum')->name('verification.send');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'show']);
    Route::put('user', [UserController::class, 'update']);
    Route::get('dinosaurs', [DinosaurController::class, 'index']);
    Route::get('roles', [RoleController::class, 'index']);
});

