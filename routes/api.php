<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

// API route untuk register
Route::post('/register', [AuthController::class, 'register']);

// API route untuk login
Route::post('/login', [AuthController::class, 'login']);

// API route untuk logout (diperlukan autentikasi)
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// API route untuk request reset password
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail']);

// API route untuk reset password dengan token
Route::post('/reset-password', [AuthController::class, 'resetPassword']);
