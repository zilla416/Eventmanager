<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('home');
})->name('homepage');

Route::get('/counter', function () {
    return view('counter');
})->name('counterpage');

Route::get('/about', function() {
    return view('about');
})->name('aboutpage');

Route::get('/login', function () {
    return view('login');
})-> name('loginpage');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

