<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        /* Hide scrollbar for IE, Edge and Firefox */
        .scrollbar-hide {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>
</head>

<body class="bg-black text-white min-h-screen">

    <div class="border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4 sm:py-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-bold mb-1">Admin Dashboard</h1>
                    <p class="text-sm sm:text-base text-gray-400">Manage your events and platform</p>
                </div>
                <a href="{{ route('homepage') }}"
                    class="px-4 py-2 border border-white/20 rounded-full text-sm hover:bg-white/5 transition whitespace-nowrap">Back to
                    Site</a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 sm:py-12">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-6 mb-8 sm:mb-12">
            <div class="bg-white/5 rounded-xl sm:rounded-2xl p-4 sm:p-6 border border-white/10">
                <div class="text-xs sm:text-sm text-gray-400 mb-1 sm:mb-2">Total Events</div>
                <div class="text-xl sm:text-3xl font-bold">{{ $totalEvents }}</div>
            </div>
            <div class="bg-white/5 rounded-xl sm:rounded-2xl p-4 sm:p-6 border border-white/10">
                <div class="text-xs sm:text-sm text-gray-400 mb-1 sm:mb-2">Total Users</div>
                <div class="text-xl sm:text-3xl font-bold">{{ $totalUsers }}</div>
            </div>
            <div class="bg-white/5 rounded-xl sm:rounded-2xl p-4 sm:p-6 border border-white/10">
                <div class="text-xs sm:text-sm text-gray-400 mb-1 sm:mb-2">Tickets Sold</div>
                <div class="text-xl sm:text-3xl font-bold">{{ $totalTicketsSold }}</div>
            </div>
            <div class="bg-white/5 rounded-xl sm:rounded-2xl p-4 sm:p-6 border border-white/10">
                <div class="text-xs sm:text-sm text-gray-400 mb-1 sm:mb-2">Revenue</div>
                <div class="text-xl sm:text-3xl font-bold">${{ $totalRevenue }}</div>
            </div>
        </div>

        <div class="flex gap-2 sm:gap-3 mb-6 sm:mb-8 overflow-x-auto pb-2 scrollbar-hide">
            <button onclick="showTab('events')" id="tab-events"
                class="px-4 sm:px-6 py-2 sm:py-3 bg-white text-black rounded-full text-xs sm:text-sm font-semibold whitespace-nowrap">Events</button>
            <button onclick="showTab('users')" id="tab-users"
                class="px-4 sm:px-6 py-2 sm:py-3 bg-white/5 rounded-full text-xs sm:text-sm border border-white/10 whitespace-nowrap">Users</button>
            <button onclick="showTab('settings')" id="tab-settings"
                class="px-4 sm:px-6 py-2 sm:py-3 bg-white/5 rounded-full text-xs sm:text-sm border border-white/10 whitespace-nowrap">Settings</button>
        </div>

        <div id="content-events">
            <div class="mb-4 sm:mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-0">
                <h2 class="text-xl sm:text-2xl font-bold">Events</h2>
                <button onclick="toggleForm()"
                    class="px-4 sm:px-6 py-2 sm:py-3 bg-white text-black rounded-full text-sm sm:text-base font-semibold hover:bg-gray-200 transition w-full sm:w-auto">+
                    Create Event</button>
            </div>

            <div id="eventForm" class="bg-white/5 rounded-xl sm:rounded-2xl p-4 sm:p-6 border border-white/10 mb-4 sm:mb-6 hidden">
                <h3 id="event-form-heading" class="text-lg sm:text-xl font-semibold mb-3 sm:mb-4">Create New Event</h3>
                <form id="event-form" method="POST" action="{{ url('/admin/cms') }}" enctype="multipart/form-data" class="space-y-3 sm:space-y-4">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Event Title</label>
                            <input type="text" id="title" name="title" required
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Date</label>
                            <input type="date" id="date" name="date" required
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Time</label>
                            <input type="time" id="time" name="time" required
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Location</label>
                            <input type="text" id="location" name="location" required
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Address</label>
                            <input type="text" id="adress" name="adress" required
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Capacity</label>
                            <input type="number" id="max_spots" name="max_spots" required
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm text-gray-400 mb-2">Description</label>
                            <textarea id="description" name="description" rows="4"
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Image</label>
                            <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-300" />
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-2 sm:gap-3">
                        <button id="event-form-submit" type="submit"
                            class="px-6 sm:px-8 py-2 sm:py-3 bg-white text-black rounded-full text-sm sm:text-base font-semibold hover:bg-gray-200 w-full sm:w-auto">Create</button>
                        <button id="event-form-cancel" type="button" onclick="toggleForm()"
                            class="px-6 sm:px-8 py-2 sm:py-3 border border-white/20 rounded-full text-sm sm:text-base hover:bg-white/5 w-full sm:w-auto">Cancel</button>
                    </div>
                </form>
            </div>

            <div class="space-y-3 sm:space-y-4">
                @foreach($recentEvents as $event)
                    <div class="bg-white/5 rounded-xl sm:rounded-2xl p-4 sm:p-6 border border-white/10">
                        <div class="flex flex-col sm:flex-row justify-between items-start gap-3 mb-4">
                            <div class="flex-1">
                                <h3 class="text-lg sm:text-xl font-bold">{{ $event['title'] }}</h3>
                                <p class="text-gray-400 text-xs sm:text-sm">{{ $event['location'] }}</p>
                                <p class="text-gray-500 text-xs sm:text-sm">{{ $event['date'] }}</p>
                            </div>
                            @if($event['status'] === 'active')
                                <span
                                    class="px-2 sm:px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-semibold whitespace-nowrap">Active</span>
                            @else
                                <span class="px-2 sm:px-3 py-1 bg-red-500/20 text-red-400 rounded-full text-xs font-semibold whitespace-nowrap">Sold
                                    Out</span>
                            @endif
                        </div>
                        <div class="flex justify-end items-center gap-2 mt-3 mb-4">
                            <button type="button" class="edit-btn inline-flex items-center justify-center h-8 w-8 sm:h-10 sm:w-10 rounded-md bg-white/5 hover:bg-white/10 text-sm"
                                title="Edit"
                                data-id="{{ $event['event_id'] }}"
                                data-title="{{ $event['title'] }}"
                                data-date="{{ $event['date'] }}"
                                data-time="{{ $event['time'] }}"
                                data-location="{{ $event['location'] }}"
                                data-adress="{{ $event['adress'] }}"
                                data-description="{{ $event['description'] }}"
                                >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a1 1 0 0 0 0-1.41l-2.34-2.34a1 1 0 0 0-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" />
                                </svg>
                            </button>

                            <form method="POST" action="{{ url('/admin/events/'.$event['event_id']) }}" onsubmit="return confirm('Delete this event?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Delete" class="inline-flex items-center justify-center h-8 w-8 sm:h-10 sm:w-10 rounded-md bg-red-600 hover:bg-red-700 text-white text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 2a10 10 0 100 20 10 10 0 000-20zm4 11H8v-2h8v2z" />
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <div class="grid grid-cols-3 gap-2 sm:gap-4 pt-3 sm:pt-4 border-t border-white/10">
                            <div>
                                <div class="text-[10px] sm:text-xs text-gray-500 mb-1">Tickets Sold</div>
                                <div class="text-xs sm:text-base font-semibold">{{ $event['tickets_sold'] }}/{{ $event['max_spots'] }}</div>
                            </div>
                            <div>
                                <div class="text-[10px] sm:text-xs text-gray-500 mb-1">Revenue</div>
                                <div class="text-xs sm:text-base font-semibold">${{ $event['revenue'] }}</div>
                            </div>
                            <div>
                                <div class="text-[10px] sm:text-xs text-gray-500 mb-1">Fill Rate</div>
                                <div class="text-xs sm:text-base font-semibold">{{ round(($event['tickets_sold'] / $event['max_spots']) * 100) }}%
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div id="content-users" class="hidden">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-0 mb-4 sm:mb-6">
                <h2 class="text-xl sm:text-2xl font-bold">User Management</h2>
                <button onclick="toggleOrganizerForm()"
                    class="px-4 sm:px-6 py-2 sm:py-3 bg-white text-black rounded-full text-sm sm:text-base font-semibold hover:bg-gray-200 transition w-full sm:w-auto">+
                    Create User</button>
            </div>

            <!-- Create Organizer Form -->
            <div id="organizerForm" class="bg-white/5 rounded-xl sm:rounded-2xl p-4 sm:p-6 border border-white/10 mb-4 sm:mb-6 hidden">
                <h3 class="text-lg sm:text-xl font-semibold mb-3 sm:mb-4">Create New User</h3>
                <form method="POST" action="{{ route('admin.users.create-organizer') }}" class="space-y-3 sm:space-y-4">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Full Name</label>
                            <input type="text" name="name" required
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Email</label>
                            <input type="email" name="email" required
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Password</label>
                            <input type="password" name="password" required minlength="8"
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
                            <p class="text-xs text-gray-500 mt-1">Minimum 8 characters</p>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">User Role</label>
                            <select name="is_admin" required
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
                                <option value="1">Organizer</option>
                                <option value="0">Customer</option>
                            </select>
                            <p class="text-xs text-gray-500 mt-1">Select user role type</p>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-2 sm:gap-3">
                        <button type="submit"
                            class="px-6 sm:px-8 py-2 sm:py-3 bg-white text-black rounded-full text-sm sm:text-base font-semibold hover:bg-gray-200 w-full sm:w-auto">Create User</button>
                        <button type="button" onclick="toggleOrganizerForm()"
                            class="px-6 sm:px-8 py-2 sm:py-3 border border-white/20 rounded-full text-sm sm:text-base hover:bg-white/5 w-full sm:w-auto">Cancel</button>
                    </div>
                </form>
            </div>
            
            <!-- Organizers Section -->
            <div class="mb-6 sm:mb-8">
                <h3 class="text-lg sm:text-xl font-semibold mb-3 sm:mb-4 flex items-center gap-2">
                    <span>Organizers</span>
                    <span class="px-2 sm:px-3 py-1 bg-purple-500/20 text-purple-400 rounded-full text-xs font-semibold">{{ count($organizers) }}</span>
                </h3>
                <div class="bg-white/5 rounded-xl sm:rounded-2xl border border-white/10 overflow-x-auto">
                    <table class="w-full min-w-[640px]">
                        <thead>
                            <tr class="border-b border-white/10">
                                <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-[10px] sm:text-xs font-medium text-gray-400 uppercase">User</th>
                                <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-[10px] sm:text-xs font-medium text-gray-400 uppercase hidden md:table-cell">Email</th>
                                <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-[10px] sm:text-xs font-medium text-gray-400 uppercase hidden lg:table-cell">Joined</th>
                                <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-[10px] sm:text-xs font-medium text-gray-400 uppercase">Role</th>
                                <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-[10px] sm:text-xs font-medium text-gray-400 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            @forelse($organizers as $organizer)
                            <tr>
                                <td class="px-3 sm:px-6 py-3 sm:py-4">
                                    <div class="flex items-center gap-2 sm:gap-3">
                                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center font-semibold text-xs sm:text-sm">
                                            {{ strtoupper(substr($organizer->name, 0, 2)) }}
                                        </div>
                                        <span class="text-sm sm:text-base">{{ $organizer->name }}</span>
                                    </div>
                                </td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4 text-gray-400 text-xs sm:text-sm hidden md:table-cell">{{ $organizer->email }}</td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4 text-gray-400 text-xs sm:text-sm hidden lg:table-cell">{{ $organizer->created_at ? $organizer->created_at->format('M d, Y') : 'N/A' }}</td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4">
                                    <span class="px-2 sm:px-3 py-1 bg-purple-500/20 text-purple-400 rounded-full text-[10px] sm:text-xs font-semibold whitespace-nowrap">Organizer</span>
                                </td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4">
                                    <div class="flex flex-col sm:flex-row gap-1 sm:gap-2">
                                        <form method="POST" action="{{ route('admin.users.demote', $organizer->id) }}" class="inline">
                                            @csrf
                                            <button type="submit" class="px-2 sm:px-4 py-1 sm:py-2 bg-orange-500/20 text-orange-400 rounded-md sm:rounded-lg text-[10px] sm:text-xs font-semibold hover:bg-orange-500/30 transition whitespace-nowrap w-full sm:w-auto">
                                                Demote
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.users.delete', $organizer->id) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-2 sm:px-4 py-1 sm:py-2 bg-red-500/20 text-red-400 rounded-md sm:rounded-lg text-[10px] sm:text-xs font-semibold hover:bg-red-500/30 transition whitespace-nowrap w-full sm:w-auto">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-3 sm:px-6 py-6 sm:py-8 text-center text-sm sm:text-base text-gray-400">No organizers found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Customers Section -->
            <div>
                <h3 class="text-lg sm:text-xl font-semibold mb-3 sm:mb-4 flex items-center gap-2">
                    <span>Customers</span>
                    <span class="px-2 sm:px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-xs font-semibold">{{ count($customers) }}</span>
                </h3>
                <div class="bg-white/5 rounded-xl sm:rounded-2xl border border-white/10 overflow-x-auto">
                    <table class="w-full min-w-[640px]">
                        <thead>
                            <tr class="border-b border-white/10">
                                <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-[10px] sm:text-xs font-medium text-gray-400 uppercase">User</th>
                                <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-[10px] sm:text-xs font-medium text-gray-400 uppercase hidden md:table-cell">Email</th>
                                <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-[10px] sm:text-xs font-medium text-gray-400 uppercase hidden lg:table-cell">Joined</th>
                                <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-[10px] sm:text-xs font-medium text-gray-400 uppercase">Role</th>
                                <th class="px-3 sm:px-6 py-3 sm:py-4 text-left text-[10px] sm:text-xs font-medium text-gray-400 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            @forelse($customers as $customer)
                            <tr>
                                <td class="px-3 sm:px-6 py-3 sm:py-4">
                                    <div class="flex items-center gap-2 sm:gap-3">
                                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center font-semibold text-xs sm:text-sm">
                                            {{ strtoupper(substr($customer->name, 0, 2)) }}
                                        </div>
                                        <span class="text-sm sm:text-base">{{ $customer->name }}</span>
                                    </div>
                                </td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4 text-gray-400 text-xs sm:text-sm hidden md:table-cell">{{ $customer->email }}</td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4 text-gray-400 text-xs sm:text-sm hidden lg:table-cell">{{ $customer->created_at ? $customer->created_at->format('M d, Y') : 'N/A' }}</td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4">
                                    <span class="px-2 sm:px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-[10px] sm:text-xs font-semibold whitespace-nowrap">Customer</span>
                                </td>
                                <td class="px-3 sm:px-6 py-3 sm:py-4">
                                    <div class="flex flex-col sm:flex-row gap-1 sm:gap-2">
                                        <form method="POST" action="{{ route('admin.users.promote', $customer->id) }}" class="inline">
                                            @csrf
                                            <button type="submit" class="px-2 sm:px-4 py-1 sm:py-2 bg-green-500/20 text-green-400 rounded-md sm:rounded-lg text-[10px] sm:text-xs font-semibold hover:bg-green-500/30 transition whitespace-nowrap w-full sm:w-auto">
                                                Promote
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.users.delete', $customer->id) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-2 sm:px-4 py-1 sm:py-2 bg-red-500/20 text-red-400 rounded-md sm:rounded-lg text-[10px] sm:text-xs font-semibold hover:bg-red-500/30 transition whitespace-nowrap w-full sm:w-auto">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-3 sm:px-6 py-6 sm:py-8 text-center text-sm sm:text-base text-gray-400">No customers found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="content-settings" class="hidden">
            <h2 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6">Settings</h2>
            <div class="max-w-2xl">
                <div class="bg-white/5 rounded-xl sm:rounded-2xl p-4 sm:p-6 border border-white/10">
                    <h3 class="text-lg font-semibold mb-3 sm:mb-4">General Settings</h3>
                    <form onsubmit="handleSettings(event)" class="space-y-3 sm:space-y-4">
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Site Name</label>
                            <input type="text" value="Event Manager"
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 text-sm sm:text-base">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Contact Email</label>
                            <input type="email" value="admin@eventmanager.com"
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 text-sm sm:text-base">
                        </div>
                        <button type="submit"
                            class="px-6 sm:px-8 py-2 sm:py-3 bg-white text-black rounded-full text-sm sm:text-base font-semibold hover:bg-gray-200 w-full sm:w-auto">Save
                            Settings</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script>
        // Tab switching
        function showTab(tab) {
            document.querySelectorAll('[id^="content-"]').forEach(el => el.classList.add('hidden'));
            document.getElementById('content-' + tab).classList.remove('hidden');
            document.querySelectorAll('[id^="tab-"]').forEach(btn => {
                btn.classList.remove('bg-white', 'text-black', 'font-semibold');
                btn.classList.add('bg-white/5', 'border', 'border-white/10');
            });
            document.getElementById('tab-' + tab).classList.remove('bg-white/5', 'border', 'border-white/10');
            document.getElementById('tab-' + tab).classList.add('bg-white', 'text-black', 'font-semibold');
        }

        // Toggle create event form
        function toggleForm() {
            const form = document.getElementById('eventForm');
            form.classList.toggle('hidden');
            if (!form.classList.contains('hidden')) {
                document.getElementById('title').focus();
            }
        }

        // Toggle create organizer form
        function toggleOrganizerForm() {
            const form = document.getElementById('organizerForm');
            form.classList.toggle('hidden');
            if (!form.classList.contains('hidden')) {
                form.querySelector('input[name="name"]').focus();
            }
        }

        // Handle create event form submission
        function handleCreateEvent(e) {
            e.preventDefault();
            const title = document.getElementById('title').value;
            const date = document.getElementById('date').value;
            const location = document.getElementById('location').value;
            const capacity = document.getElementById('capacity').value;

            alert('✅ Event Created Successfully!\n\n' +
                'Title: ' + title + '\n' +
                'Date: ' + date + '\n' +
                'Location: ' + location + '\n' +
                'Capacity: ' + capacity + '\n\n' +
                'This will be connected to the database later.');

            e.target.reset();
            toggleForm();
        }

        // Handle settings form submission
        function handleSettings(e) {
            e.preventDefault();
            const siteName = e.target.querySelector('input[type="text"]').value;
            const email = e.target.querySelector('input[type="email"]').value;

            alert('✅ Settings Saved Successfully!\n\n' +
                'Site Name: ' + siteName + '\n' +
                'Contact Email: ' + email + '\n\n' +
                'This will be connected to the database later.');
        }

        // Wire edit buttons to prefill the form
        (function(){
            const editBtns = document.querySelectorAll('.edit-btn');
            const form = document.getElementById('event-form');
            const heading = document.getElementById('event-form-heading');
            const submitBtn = document.getElementById('event-form-submit');
            const cancelBtn = document.getElementById('event-form-cancel');

            if(!form) return;

            function switchToCreate(){
                form.removeAttribute('data-editing');
                const methodInput = form.querySelector('input[name="_method"]');
                if(methodInput) methodInput.remove();
                form.action = "{{ url('/admin/cms') }}";
                if(heading) heading.textContent = 'Create New Event';
                if(submitBtn) submitBtn.textContent = 'Create';
                form.reset();
            }

            function switchToEdit(data){
                form.setAttribute('data-editing', data.id);
                // set form action and add _method=PUT
                form.action = '/admin/events/' + data.id;
                let methodInput = form.querySelector('input[name="_method"]');
                if(!methodInput){
                    methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    form.appendChild(methodInput);
                }
                methodInput.value = 'PUT';

                // fill fields
                form.querySelector('#title').value = data.title || '';
                form.querySelector('#date').value = data.date || '';
                if(form.querySelector('#time')) form.querySelector('#time').value = data.time || '';
                form.querySelector('#location').value = data.location || '';
                form.querySelector('#adress').value = data.adress || '';
                if(form.querySelector('#max_spots')) form.querySelector('#max_spots').value = data.max_spots || data.maxSpots || '';
                if(form.querySelector('#description')) form.querySelector('#description').value = data.description || '';

                if(heading) heading.textContent = 'Edit Event';
                if(submitBtn) submitBtn.textContent = 'Save changes';
                // show form
                const wrap = document.getElementById('eventForm');
                if(wrap) wrap.classList.remove('hidden');
            }

            editBtns.forEach(btn => {
                btn.addEventListener('click', function(){
                    const data = {
                        id: btn.dataset.id,
                        title: btn.dataset.title,
                        date: btn.dataset.date,
                        time: btn.dataset.time,
                        location: btn.dataset.location,
                        adress: btn.dataset.adress,
                        description: btn.dataset.description,
                        max_spots: btn.dataset.max_spots
                    };
                    switchToEdit(data);
                });
            });

            if(cancelBtn){
                cancelBtn.addEventListener('click', function(){
                    switchToCreate();
                    document.getElementById('eventForm').classList.add('hidden');
                });
            }
        })();
    </script>

</body>

</html>