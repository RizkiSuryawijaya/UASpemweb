<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

// Halaman Login
Route::get('/login', function () {
    return view('login');
})->name('login');

// Route untuk menangani proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Route untuk menampilkan halaman registrasi
Route::get('/register', function () {
    return view('register');
})->name('register');

// Route untuk menangani proses pendaftaran
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Halaman Forgot Password
Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('password.request');

// Route untuk mengirimkan link reset password
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

// Route untuk halaman reset password (menampilkan form untuk memasukkan kode reset dan password baru)
Route::get('/reset-password/{token}', function ($token) {
    return view('reset-password', ['token' => $token]);
})->name('password.reset');

// Route untuk mengatur password baru
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// Halaman Dashboard setelah login (hanya bisa diakses oleh pengguna yang sudah login)
Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
