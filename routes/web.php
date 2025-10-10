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

// CMS Dashboard for Event Organizers and Admins
Route::get('/admin/cms', function () {
    // Mock data for the CMS dashboard
    $totalEvents = 25;
    $totalUsers = 1250;
    $totalTicketsSold = 8540;
    $totalRevenue = 425000;

    // Recent events data
    $recentEvents = [
        [
            'id' => 1,
            'title' => 'Summer Music Festival 2025',
            'date' => '2025-07-15',
            'location' => 'Central Park, NY',
            'tickets_sold' => 1500,
            'capacity' => 2000,
            'status' => 'active',
            'revenue' => 75000
        ],
        [
            'id' => 2,
            'title' => 'Tech Innovation Summit',
            'date' => '2025-06-22',
            'location' => 'Convention Center, SF',
            'tickets_sold' => 850,
            'capacity' => 1000,
            'status' => 'active',
            'revenue' => 42500
        ],
        [
            'id' => 3,
            'title' => 'Basketball Championship',
            'date' => '2025-05-18',
            'location' => 'Sports Arena, LA',
            'tickets_sold' => 2200,
            'capacity' => 2200,
            'status' => 'sold_out',
            'revenue' => 110000
        ]
    ];

    return view('cms', compact('totalEvents', 'totalUsers', 'totalTicketsSold', 'totalRevenue', 'recentEvents'));
})->name('admin.cms');

// Organizer CMS Dashboard - Limited functionality for event organizers
Route::get('/organizer/cms', function () {
    // Mock data for organizer's own events only
    $organizerName = 'John Smith'; // In production, this would come from authentication

    // Organizer's events only (subset of all events)
    $organizerEvents = [
        [
            'id' => 1,
            'title' => 'Summer Music Festival 2025',
            'date' => '2025-07-15',
            'location' => 'Central Park, NY',
            'tickets_sold' => 1500,
            'capacity' => 2000,
            'status' => 'active',
            'revenue' => 75000,
            'created_at' => '2025-01-15'
        ],
        [
            'id' => 4,
            'title' => 'Local Art Exhibition',
            'date' => '2025-08-12',
            'location' => 'Community Gallery, Brooklyn',
            'tickets_sold' => 120,
            'capacity' => 200,
            'status' => 'active',
            'revenue' => 2400,
            'created_at' => '2025-02-20'
        ],
        [
            'id' => 5,
            'title' => 'Jazz Night Concert',
            'date' => '2025-09-05',
            'location' => 'Blue Note Club, NYC',
            'tickets_sold' => 180,
            'capacity' => 180,
            'status' => 'sold_out',
            'revenue' => 5400,
            'created_at' => '2025-03-10'
        ]
    ];

    // Calculate organizer's stats
    $totalOrganizerEvents = count($organizerEvents);
    $totalOrganizerRevenue = array_sum(array_column($organizerEvents, 'revenue'));
    $totalOrganizerTickets = array_sum(array_column($organizerEvents, 'tickets_sold'));

    return view('organizer-cms', compact('organizerName', 'organizerEvents', 'totalOrganizerEvents', 'totalOrganizerRevenue', 'totalOrganizerTickets'));
})->name('organizer.cms');
