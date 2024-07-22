<?php

use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('register', function () {
    return view('auth.register');
})->name('register');

Route::post('register', [AuthController::class, 'register']);

Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::post('login', [AuthController::class, 'login']);

Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');

Route::get('email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('email/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('resent', true);
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
