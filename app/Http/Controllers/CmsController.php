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

        // events table includes tickets_sold and revenue per provided SQL dump
        $totalTicketsSold = Event::sum('tickets_sold');
        $totalRevenue = Event::sum('revenue');

        $recentEvents = Event::orderBy('date', 'desc')->get()->map(function ($event) {
            return [
                'event_id' => $event->event_id,
                'id' => $event->event_id,
                'title' => $event->title,
                'date' => $event->date,
                'time' => $event->time,
                'location' => $event->location,
                'adress' => $event->adress,
                'description' => $event->description,
                'image' => $event->image,
                'category_id' => $event->category_id,
                'max_spots' => $event->max_spots,
                'available_spots' => $event->available_spots,
                'tickets_sold' => $event->tickets_sold,
                'revenue' => $event->revenue,
                'status' => ($event->available_spots ?? 0) > 0 ? 'active' : 'sold_out',
            ];
        })->toArray();

        // Get customers (is_admin = 0) and organizers (is_admin = 1)
        $customers = User::where('is_admin', 0)->orderBy('created_at', 'desc')->get();
        $organizers = User::where('is_admin', 1)->orderBy('created_at', 'desc')->get();

        return view('cms', compact('totalEvents', 'totalUsers', 'totalTicketsSold', 'totalRevenue', 'recentEvents', 'customers', 'organizers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
            'max_spots' => 'required|integer',
            'image' => 'nullable|image|max:5120',
            'description' => 'nullable|string',
        ]);

        // handle image upload
        $imagePath = $request->input('image', null);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $stored = $request->file('image')->store('events', 'public');
            // make a public-facing path (requires `php artisan storage:link`)
            $imagePath = 'storage/' . $stored;
        }

        $event = Event::create([
            'title' => $data['title'],
            'date' => $data['date'],
            'time' => $data['time'],
            'location' => $data['location'],
            'adress' => $data['adress'],
            'max_spots' => $data['max_spots'],
            'available_spots' => $data['max_spots'],
            'description' => $data['description'] ?? '',
            'image' => $imagePath ?? $request->input('image', 'resources/img/concert1.png'),
            'category_id' => 1,
            'tickets_sold' => 0,
            'revenue' => 0,
        ]);

    return redirect()->back()->with('success', 'Event created');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return response()->json($event);
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
            'max_spots' => 'required|integer',
            'image' => 'nullable|image|max:5120',
            'description' => 'nullable|string',
        ]);

        // handle image upload for update
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $stored = $request->file('image')->store('events', 'public');
            $data['image'] = 'storage/' . $stored;
        }

        $event->update([
            'title' => $data['title'],
            'date' => $data['date'],
            'time' => $data['time'],
            'location' => $data['location'],
            'adress' => $data['adress'],
            'max_spots' => $data['max_spots'],
            'available_spots' => $data['max_spots'],
            'description' => $data['description'] ?? $event->description,
            'image' => $data['image'] ?? $event->image,
        ]);

    return redirect()->back()->with('success', 'Event updated');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->back()->with('success', 'Event deleted');
    }

    public function promoteUser($id)
    {
        $user = User::findOrFail($id);
        
        // Promote customer (0) to organizer (1)
        if ($user->is_admin == 0) {
            $user->is_admin = 1;
            $user->save();
            return redirect()->back()->with('success', $user->name . ' has been promoted to Organizer');
        }
        
        return redirect()->back()->with('error', 'User cannot be promoted');
    }

    public function demoteUser($id)
    {
        $user = User::findOrFail($id);
        
        // Demote organizer (1) to customer (0)
        if ($user->is_admin == 1) {
            $user->is_admin = 0;
            $user->save();
            return redirect()->back()->with('success', $user->name . ' has been demoted to Customer');
        }
        
        return redirect()->back()->with('error', 'User cannot be demoted');
    }

    public function createOrganizer(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'is_admin' => 'required|in:0,1', // Only allow 0 (customer) or 1 (organizer)
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'is_admin' => $data['is_admin'],
        ]);

        $roleText = $data['is_admin'] == 1 ? 'Organizer' : 'Customer';
        return redirect()->back()->with('success', $roleText . ' ' . $user->name . ' has been created successfully');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        
        // Prevent deleting admin (is_admin = 2)
        if ($user->is_admin == 2) {
            return redirect()->back()->with('error', 'Cannot delete admin users');
        }
        
        $userName = $user->name;
        $user->delete();
        
        return redirect()->back()->with('success', 'User ' . $userName . ' has been deleted successfully');
    }
}
