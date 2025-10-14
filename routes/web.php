<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Models\Event;
use App\Http\Controllers\CmsController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Login (GET shows form, POST handles login)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginpage');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register (GET shows form, POST handles register)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/account-design', function () {
    // Check if user is logged in
    if (!auth()->check()) {
        return redirect()->route('loginpage')->with('error', 'Please login to access your account.');
    }

    $user = auth()->user();

    // Get user's tickets/events from database
    // For now using dummy data, replace with actual database queries later
    $upcomingTickets = [
        [
            'id' => 1,
            'event_title' => 'Summer Music Festival',
            'date' => 'JUN 15, 2025',
            'time' => '7:00 PM',
            'location' => 'Central Park, NY',
            'tickets_count' => 2,
            'ticket_id' => 'SMF2025'
        ],
        [
            'id' => 2,
            'event_title' => 'Tech Conference 2025',
            'date' => 'JUL 20, 2025',
            'time' => '9:00 AM',
            'location' => 'Convention Center',
            'tickets_count' => 1,
            'ticket_id' => 'TC2025'
        ]
    ];

    $pastEvents = [
        [
            'event_title' => 'Jazz Night Experience',
            'date' => 'March 10, 2025',
            'location' => 'Blue Note Jazz Club'
        ],
        [
            'event_title' => 'Rock Concert Spectacular',
            'date' => 'February 14, 2025',
            'location' => 'Madison Square Garden'
        ]
    ];

    // Calculate stats
    $totalSpent = 1240; // Will be calculated from actual purchases
    $upcomingEventsCount = count($upcomingTickets);
    $totalTickets = array_sum(array_column($upcomingTickets, 'tickets_count'));
    $eventsAttended = count($pastEvents);
    $memberSince = $user->created_at ? $user->created_at->format('M Y') : 'Jan 2025';

    return view('account-design', compact(
        'user',
        'upcomingTickets',
        'pastEvents',
        'totalSpent',
        'upcomingEventsCount',
        'totalTickets',
        'eventsAttended',
        'memberSince'
    ));
})->name('account-designpage');
Route::get('/home', function () {
    $event = Event::first(); // just grabs the first event in DB

    return view('home', compact('event'));
})->name('homepage');

Route::get('/event', function () {
    $event = Event::first(); // just grabs the first event in DB

    return view('event', compact('event'));
})->name('eventpage');


// Checkout page
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

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

// Account management routes
Route::middleware('auth')->group(function () {
    Route::post('/account/profile', [App\Http\Controllers\AccountController::class, 'updateProfile'])->name('account.profile.update');
    Route::post('/account/password', [App\Http\Controllers\AccountController::class, 'updatePassword'])->name('account.password.update');
    Route::delete('/account', [App\Http\Controllers\AccountController::class, 'deleteAccount'])->name('account.delete');
});

// CMS Dashboard for Event Organizers and Admins
Route::get('/admin/cms', [CmsController::class, 'index'])->name('admin.cms');
Route::post('/admin/cms', [CmsController::class, 'store'])->name('admin.cms.store');
Route::get('/admin/events/{id}/edit', [CmsController::class, 'edit'])->name('admin.events.edit');
Route::put('/admin/events/{id}', [CmsController::class, 'update'])->name('admin.events.update');
Route::delete('/admin/events/{id}', [CmsController::class, 'destroy'])->name('admin.events.destroy');

// User Management Routes
Route::post('/admin/users/{id}/promote', [CmsController::class, 'promoteUser'])->name('admin.users.promote');
Route::post('/admin/users/{id}/demote', [CmsController::class, 'demoteUser'])->name('admin.users.demote');
Route::post('/admin/users/create-organizer', [CmsController::class, 'createOrganizer'])->name('admin.users.create-organizer');
Route::delete('/admin/users/{id}', [CmsController::class, 'deleteUser'])->name('admin.users.delete');

// Organizer CMS Dashboard - Limited functionality for event organizers
Route::get('/organizer/cms', function () {
    // Use the first user as organizer display name (no auth context available)
    $organizer = User::first();
    $organizerName = $organizer->name ?? 'Organizer';

    // Load events from the database. There isn't an organizer_id on events in the current schema,
    // so we return all events ordered by date. If you later add an organizer relationship, filter here.
    $events = App\Models\Event::orderBy('date', 'desc')->get();

    $organizerEvents = $events->map(function($event){
        return [
            'id' => $event->event_id,
            'title' => $event->title,
            'date' => $event->date,
            'location' => $event->location,
            'tickets_sold' => $event->tickets_sold ?? 0,
            // use max_spots as requested
            'max_spots' => $event->max_spots ?? 0,
            'status' => ($event->available_spots ?? 0) > 0 ? 'active' : 'sold_out',
            'revenue' => $event->revenue ?? 0,
            // created_at not in events table in SQL dump, use date as fallback for display
            'created_at' => $event->created_at ?? $event->date,
        ];
    })->toArray();

    $totalOrganizerEvents = count($organizerEvents);
    $totalOrganizerRevenue = array_sum(array_column($organizerEvents, 'revenue'));
    $totalOrganizerTickets = array_sum(array_column($organizerEvents, 'tickets_sold'));

    return view('organizer-cms', compact('organizerName', 'organizerEvents', 'totalOrganizerEvents', 'totalOrganizerRevenue', 'totalOrganizerTickets'));
})->name('organizer.cms');

// Footer pages
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/help', function () {
    return view('help');
})->name('help');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');
