<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function index()
    {
        $totalEvents = Event::count();
        $totalUsers = User::count();
        // For demonstration, assume each event has a 'tickets_sold', 'capacity', 'revenue' column. If not, set to 0 or calculate as needed.
        $totalTicketsSold = Event::sum('tickets_sold');
        $totalRevenue = Event::sum('revenue');

        $recentEvents = Event::orderBy('date', 'desc')->take(5)->get()->map(function ($event) {
            return [
                'id' => $event->event_id,
                'title' => $event->title,
                'date' => $event->date,
                'location' => $event->location,
                'tickets_sold' => $event->tickets_sold ?? 0,
                'capacity' => $event->max_spots ?? 0,
                'status' => ($event->available_spots ?? 0) > 0 ? 'active' : 'sold_out',
                'revenue' => $event->revenue ?? 0,
            ];
        })->toArray();

        return view('cms', compact('totalEvents', 'totalUsers', 'totalTicketsSold', 'totalRevenue', 'recentEvents'));
    }
}
