<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;

// Homepage
Route::get('/', function () {
    return view('home');
})->name('homepage');

// Counter page
Route::get('/counter', function () {
    return view('counter');
})->name('counterpage');

// About page
Route::get('/about', function () {
    return view('about');
})->name('aboutpage');

// Login (GET shows form, POST handles login)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginpage');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Register (GET shows form, POST handles register)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);