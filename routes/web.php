<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Models\Event;
use Illuminate\Support\Facades\Route;

// Login (GET shows form, POST handles login)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginpage');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Register (GET shows form, POST handles register)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/', function () {
    $event = Event::first(); // just grabs the first event in DB

    return view('home', compact('event'));
})->name('homepage');

Route::get('/event', function () {
    $event = Event::first();

    return view('event', compact('event'));
})->name('eventpage');
