<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Login
Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AdminController::class, 'login'])->name('login');

// Register
Route::get('/register', [AdminController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AdminController::class, 'register'])->name('register');

// Forgot Password (kombinasi dengan reset password)
Route::get('/forgot-password', [AdminController::class, 'showForgotPasswordForm'])->name('password.request');

// Menangani pengiriman email reset dan proses reset password
Route::post('/forgot-password/send', [AdminController::class, 'sendResetEmail'])->name('password.sendEmail');
Route::post('/forgot-password/reset', [AdminController::class, 'resetPassword'])->name('password.resetPassword');

// Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login.form'); // Arahkan ke halaman login
})->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('lutfi.dashboard');
});
