<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Event;


// Homepage
Route::get('/', function () {
    return view('home');
})->name('homepage');

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

// Account page
Route::get('/account', function () {
    // Hardcoded events list matching database structure (will be replaced with database fetch in the future)
    $upcomingEvents = [
        [
            'event_id' => 1,
            'title' => 'Concert Ziggodome',
            'location' => 'Ziggodome',
            'address' => 'De Passage 100, 1101 AX Amsterdam',
            'available_spots' => 17000,
            'date' => '2025-12-01',
            'time' => '19:00:00',
            'description' => 'Super cool concert',
            'image' => 'resources/img/concert1.png',
            'category_id' => 1,
            'max_spots' => 17000,
            'user_tickets' => 2,
            'icon' => 'fas fa-music',
            'color' => 'bg-red-600'
        ],
        [
            'event_id' => 2,
            'title' => 'Basketball Championship',
            'location' => 'Sports Arena',
            'address' => '123 Arena Boulevard, Los Angeles, CA',
            'available_spots' => 15000,
            'date' => '2025-11-15',
            'time' => '20:00:00',
            'description' => 'Epic basketball championship match',
            'image' => 'resources/img/concert1.png',
            'category_id' => 2,
            'max_spots' => 18000,
            'user_tickets' => 4,
            'icon' => 'fas fa-basketball-ball',
            'color' => 'bg-blue-600'
        ],
        [
            'event_id' => 3,
            'title' => 'Tech Innovation Summit',
            'location' => 'Convention Center',
            'address' => '456 Tech Street, San Francisco, CA',
            'available_spots' => 2500,
            'date' => '2025-10-25',
            'time' => '09:00:00',
            'description' => 'Latest trends in technology and innovation',
            'image' => 'resources/img/concert1.png',
            'category_id' => 3,
            'max_spots' => 3000,
            'user_tickets' => 1,
            'icon' => 'fas fa-laptop-code',
            'color' => 'bg-green-600'
        ],
        [
            'event_id' => 4,
            'title' => 'Modern Art Exhibition',
            'location' => 'Art Museum',
            'address' => '789 Culture Avenue, New York, NY',
            'available_spots' => 800,
            'date' => '2025-11-30',
            'time' => '18:00:00',
            'description' => 'Contemporary art showcase featuring emerging artists',
            'image' => 'resources/img/concert1.png',
            'category_id' => 4,
            'max_spots' => 1000,
            'user_tickets' => 3,
            'icon' => 'fas fa-palette',
            'color' => 'bg-purple-600'
        ]
    ];

    // Calculate total tickets owned by the user
    $totalTickets = array_sum(array_column($upcomingEvents, 'user_tickets'));

    return view('account', compact('upcomingEvents', 'totalTickets'));
})->name('account');

// Account settings page
Route::get('/account/settings', function () {
    return view('account-settings');
})->name('account.settings');
