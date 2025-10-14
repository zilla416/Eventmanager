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

Route::get('/account', function () {
    // Check if user is logged in
    if (!auth()->check()) {
        return redirect()->route('loginpage')->with('error', 'Please login to access your account.');
    }

    $user = auth()->user();
    $upcomingTickets = [];
    $pastEvents = [];
    $upcomingEventsCount = 0;
    $totalTickets = 0;
    $eventsAttended = 0;
    $memberSince = $user->created_at ? $user->created_at->format('M Y') : 'Jan 2025';

    try {
        // Load real orders from database
        if (\Schema::hasTable('orders') && \Schema::hasColumn('orders', 'customer_id') && \Schema::hasColumn('orders', 'event_id')) {
            $orders = App\Models\Order::where('customer_id', $user->id)->get();
            $today = \Carbon\Carbon::today();
            
            // Group orders by event_id to consolidate duplicate events
            $eventGroups = [];
            
            foreach ($orders as $order) {
                $event = App\Models\Event::find($order->event_id);
                if (!$event) continue;
                
                $eventId = $event->event_id;
                
                // If this event hasn't been added yet, initialize it
                if (!isset($eventGroups[$eventId])) {
                    $eventDate = \Carbon\Carbon::parse($event->date);
                    $eventTime = $event->time ? \Carbon\Carbon::parse($event->time)->format('g:i A') : 'TBA';
                    
                    $eventGroups[$eventId] = [
                        'event' => $event,
                        'event_date' => $eventDate,
                        'event_time' => $eventTime,
                        'orders' => [],
                        'total_tickets' => 0
                    ];
                }
                
                // Add this order to the event group
                $eventGroups[$eventId]['orders'][] = $order;
                $eventGroups[$eventId]['total_tickets'] += $order->quantity ?? 1;
            }
            
            // Now create the ticket arrays with consolidated data
            foreach ($eventGroups as $eventId => $group) {
                $event = $group['event'];
                $eventDate = $group['event_date'];
                $eventTime = $group['event_time'];
                
                // Get the first order for ticket ID (or create a combined one)
                $firstOrder = $group['orders'][0];
                $orderIds = array_map(fn($o) => $o->order_id, $group['orders']);
                
                $eventData = [
                    'id' => $firstOrder->order_id,
                    'ticket_id' => 'TKT-' . str_pad($firstOrder->order_id, 6, '0', STR_PAD_LEFT),
                    'order_ids' => $orderIds, // Store all order IDs for this event
                    'event_title' => $event->title,
                    'date' => $eventDate->format('M d, Y'),
                    'date_day' => $eventDate->format('d'),
                    'date_month_year' => $eventDate->format('M Y'),
                    'time' => $eventTime,
                    'location' => $event->location,
                    'tickets_count' => $group['total_tickets'], // Total tickets for this event
                ];
                
                // Check if event is in the future (after today)
                if ($eventDate->isAfter($today)) {
                    $upcomingTickets[] = $eventData;
                } else {
                    // Past or today events - include full ticket data
                    $pastEvents[] = $eventData;
                }
            }
            
            $upcomingEventsCount = count($upcomingTickets);
            $totalTickets = $orders->sum('quantity');
            $eventsAttended = count($pastEvents);
        }
    } catch (\Exception $e) {
        // If anything goes wrong, use empty arrays
        \Log::error('Error loading user tickets: ' . $e->getMessage());
    }

    return view('account', compact(
        'user',
        'upcomingTickets',
        'pastEvents',
        'upcomingEventsCount',
        'totalTickets',
        'eventsAttended',
        'memberSince'
    ));
})->name('account');
Route::get('/home', function () {
    $events = Event::orderBy('date', 'asc')->get();

    return view('home', compact('events'));
})->name('homepage');

Route::get('/event/{id}', function ($id) {
    $event = Event::findOrFail($id);
    return view('event', compact('event'));
})->name('eventpage');


// Checkout page
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

// Purchase endpoint: accepts cart_data and creates orders for authenticated user
Route::post('/purchase', function (Illuminate\Http\Request $request) {
    if (!auth()->check()) {
        return redirect()->route('loginpage')->with('error', 'Please login to complete purchase.');
    }

    $user = auth()->user();

    $data = $request->validate([
        'cart_data' => 'required|string',
        'total' => 'required|numeric|min:0',
    ]);

    // Ensure orders table has necessary columns
    if (!\Schema::hasTable('orders') || !\Schema::hasColumn('orders', 'customer_id') || !\Schema::hasColumn('orders', 'event_id')) {
        return back()->with('error', 'Order table is not configured to store purchases. Please run the migration to add order columns.');
    }

    // Parse cart data
    $cartItems = json_decode($data['cart_data'], true);
    
    if (empty($cartItems)) {
        return back()->with('error', 'Your cart is empty.');
    }

    // Create orders for each cart item
    foreach ($cartItems as $item) {
        $itemTotal = $item['quantity'] * floatval($item['price']);
        $serviceFee = $item['quantity'] * 4.475;
        $itemTotalWithFees = $itemTotal + $serviceFee;
        
        $order = App\Models\Order::create([
            'order_date' => time(),
            'customer_id' => $user->id,
            'event_id' => $item['event_id'],
            'quantity' => $item['quantity'],
            'total' => $itemTotalWithFees,
            'status' => 'completed',
        ]);

        // Update event counts
        $event = App\Models\Event::find($item['event_id']);
        if ($event) {
            $event->available_spots = max(0, ($event->available_spots ?? $event->max_spots ?? 0) - $item['quantity']);
            $event->tickets_sold = ($event->tickets_sold ?? 0) + $item['quantity'];
            $event->revenue = ($event->revenue ?? 0) + intval(round($itemTotalWithFees));
            $event->save();
        }
    }

    return redirect()->route('account')->with('success', 'Purchase completed successfully! Your tickets are in your account.');
})->name('purchase');

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

// Organizer routes for event management
Route::get('/organizer/events/create', function () {
    if (!auth()->check()) {
        return redirect()->route('loginpage')->with('error', 'Please login to create events.');
    }
    if (auth()->user()->is_admin < 1) {
        return redirect()->route('homepage')->with('error', 'Access denied.');
    }
    return view('organizer-event-form');
})->name('organizer.events.create');

Route::post('/organizer/events', [CmsController::class, 'store'])->name('organizer.events.store');

Route::get('/organizer/events/{id}/edit', function ($id) {
    if (!auth()->check()) {
        return redirect()->route('loginpage')->with('error', 'Please login to edit events.');
    }
    
    $user = auth()->user();
    $event = App\Models\Event::findOrFail($id);
    
    // Check if user owns this event (or is admin)
    if ($user->is_admin != 2 && $event->organizer_id != $user->id) {
        return redirect()->route('organizer.cms')->with('error', 'You can only edit your own events.');
    }
    
    return view('organizer-event-form', compact('event'));
})->name('organizer.events.edit');

Route::put('/organizer/events/{id}', [CmsController::class, 'update'])->name('organizer.events.update');
Route::delete('/organizer/events/{id}', [CmsController::class, 'destroy'])->name('organizer.events.destroy');

// Organizer CMS Dashboard - Limited functionality for event organizers
Route::get('/organizer/cms', function () {
    if (!auth()->check()) {
        return redirect()->route('loginpage')->with('error', 'Please login to access organizer dashboard.');
    }

    $user = auth()->user();
    $organizerName = $user->name;

    // Admin (is_admin = 2) can see all events, organizers (is_admin = 1) see only their events
    if ($user->is_admin == 2) {
        // Admin sees everything
        $events = App\Models\Event::orderBy('date', 'desc')->get();
    } elseif ($user->is_admin == 1) {
        // Organizer sees only their own events
        $events = App\Models\Event::where('organizer_id', $user->id)->orderBy('date', 'desc')->get();
    } else {
        // Regular customers shouldn't access this page
        return redirect()->route('homepage')->with('error', 'Access denied.');
    }

    $organizerEvents = $events->map(function($event){
        return [
            'id' => $event->event_id,
            'title' => $event->title,
            'date' => $event->date,
            'location' => $event->location,
            'tickets_sold' => $event->tickets_sold ?? 0,
            'max_spots' => $event->max_spots ?? 0,
            'status' => ($event->available_spots ?? 0) > 0 ? 'active' : 'sold_out',
            'revenue' => $event->revenue ?? 0,
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
