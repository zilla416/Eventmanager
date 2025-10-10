@extends('layouts.app')@extends('layouts.app')@extends('layouts.app')



@section('title', 'Admin Dashboard')



@section('content')@section('title', 'Admin Dashboard')@section('title', 'Admin Dashboard')

<div class="min-h-screen bg-black text-white">

    <!-- Header -->

    <div class="border-b border-white/10">

        <div class="max-w-7xl mx-auto px-6 md:px-8 py-6">@section('content')@section('content')

            <div class="flex justify-between items-center">

                <div><div class="min-h-screen bg-black text-white"><div class="min-h-screen bg-black text-white">

                    <h1 class="text-3xl md:text-4xl font-bold mb-1">Admin Dashboard</h1>

                    <p class="text-gray-400">Manage your events and platform</p>    <!-- Header -->    <!-- Header -->

                </div>

                <a href="{{ route('account') }}" class="px-4 py-2 border border-white/20 rounded-full text-sm font-medium hover:bg-white/5 transition">    <div class="border-b border-white/10">    <div class="border-b border-white/10">

                    User View

                </a>        <div class="max-w-7xl mx-auto px-6 md:px-8 py-6">        <div class="max-w-7xl mx-auto px-6 md:px-8 py-6">

            </div>

        </div>            <div class="flex justify-between items-center">            <div class="flex justify-between items-center">

    </div>

                <div>                <div>

    <!-- Main Content -->

    <div class="max-w-7xl mx-auto px-6 md:px-8 py-12">                    <h1 class="text-3xl md:text-4xl font-bold mb-1">Admin Dashboard</h1>                    <h1 class="text-3xl md:text-4xl font-bold mb-1">Admin Dashboard</h1>

        

        <!-- Stats Grid -->                    <p class="text-gray-400">Manage your events and platform</p>                    <p class="text-gray-400">Manage your events and platform</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">

            <div class="bg-white/5 rounded-2xl p-6 border border-white/10">                </div>                </div>

                <div class="text-sm text-gray-400 mb-2">Total Events</div>

                <div class="text-3xl font-bold mb-1">{{ $totalEvents }}</div>                <a href="{{ route('account') }}" class="px-4 py-2 border border-white/20 rounded-full text-sm font-medium hover:bg-white/5 transition">                <a href="{{ route('account') }}" class="px-4 py-2 border border-white/20 rounded-full text-sm font-medium hover:bg-white/5 transition">

                <div class="text-xs text-gray-500">All time</div>

            </div>                    User View                    User View



            <div class="bg-white/5 rounded-2xl p-6 border border-white/10">                </a>                </a>

                <div class="text-sm text-gray-400 mb-2">Registered Users</div>

                <div class="text-3xl font-bold mb-1">{{ number_format($totalUsers) }}</div>            </div>            </div>

                <div class="text-xs text-gray-500">Platform wide</div>

            </div>        </div>        </div>



            <div class="bg-white/5 rounded-2xl p-6 border border-white/10">    </div>    </div>

                <div class="text-sm text-gray-400 mb-2">Tickets Sold</div>

                <div class="text-3xl font-bold mb-1">{{ number_format($totalTicketsSold) }}</div>

                <div class="text-xs text-gray-500">Total sales</div>

            </div>    <!-- Main Content -->    <!-- Main Content -->



            <div class="bg-white/5 rounded-2xl p-6 border border-white/10">    <div class="max-w-7xl mx-auto px-6 md:px-8 py-12">    <div class="max-w-7xl mx-auto px-6 md:px-8 py-12">

                <div class="text-sm text-gray-400 mb-2">Total Revenue</div>

                <div class="text-3xl font-bold mb-1">${{ number_format($totalRevenue) }}</div>                

                <div class="text-xs text-gray-500">Gross earnings</div>

            </div>        <!-- Stats Grid -->        <!-- Stats Grid -->

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">

        <!-- Navigation Tabs -->

        <div class="flex gap-3 mb-8 overflow-x-auto pb-3 scrollbar-hide">            <div class="bg-white/5 rounded-2xl p-6 border border-white/10">            <div class="bg-white/5 rounded-2xl p-6 border border-white/10">

            <button onclick="showTab('events')" id="events-tab" class="tab-btn active px-6 py-3 bg-white text-black rounded-full text-sm font-semibold whitespace-nowrap transition">

                Events                <div class="text-sm text-gray-400 mb-2">Total Events</div>                <div class="text-sm text-gray-400 mb-2">Total Events</div>

            </button>

            <button onclick="showTab('users')" id="users-tab" class="tab-btn px-6 py-3 bg-white/5 hover:bg-white/10 rounded-full text-sm font-medium whitespace-nowrap transition border border-white/10">                <div class="text-3xl font-bold mb-1">{{ $totalEvents }}</div>                <div class="text-3xl font-bold mb-1">{{ $totalEvents }}</div>

                Users

            </button>                <div class="text-xs text-gray-500">All time</div>                <div class="text-xs text-gray-500">All time</div>

            <button onclick="showTab('analytics')" id="analytics-tab" class="tab-btn px-6 py-3 bg-white/5 hover:bg-white/10 rounded-full text-sm font-medium whitespace-nowrap transition border border-white/10">

                Analytics            </div>            </div>

            </button>

            <button onclick="showTab('settings')" id="settings-tab" class="tab-btn px-6 py-3 bg-white/5 hover:bg-white/10 rounded-full text-sm font-medium whitespace-nowrap transition border border-white/10">

                Settings

            </button>            <div class="bg-white/5 rounded-2xl p-6 border border-white/10">            <div class="bg-white/5 rounded-2xl p-6 border border-white/10">

        </div>

                <div class="text-sm text-gray-400 mb-2">Registered Users</div>                <div class="text-sm text-gray-400 mb-2">Registered Users</div>

        <!-- Events Tab -->

        <div id="events-content" class="tab-content">                <div class="text-3xl font-bold mb-1">{{ number_format($totalUsers) }}</div>                <div class="text-3xl font-bold mb-1">{{ number_format($totalUsers) }}</div>

            <!-- Create Event Button -->

            <div class="mb-8 flex justify-between items-center">                <div class="text-xs text-gray-500">Platform wide</div>                <div class="text-xs text-gray-500">Platform wide</div>

                <h2 class="text-2xl font-bold">Event Management</h2>

                <button onclick="toggleCreateForm()" class="px-6 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition">            </div>            </div>

                    + Create Event

                </button>

            </div>

            <div class="bg-white/5 rounded-2xl p-6 border border-white/10">            <div class="bg-white/5 rounded-2xl p-6 border border-white/10">

            <!-- Create Event Form (Hidden by default) -->

            <div id="createEventForm" class="bg-white/5 rounded-2xl p-6 border border-white/10 mb-8 hidden">                <div class="text-sm text-gray-400 mb-2">Tickets Sold</div>                <div class="text-sm text-gray-400 mb-2">Tickets Sold</div>

                <h3 class="text-xl font-semibold mb-6">Create New Event</h3>

                <form class="space-y-6">                <div class="text-3xl font-bold mb-1">{{ number_format($totalTicketsSold) }}</div>                <div class="text-3xl font-bold mb-1">{{ number_format($totalTicketsSold) }}</div>

                    <div class="grid md:grid-cols-2 gap-6">

                        <div>                <div class="text-xs text-gray-500">Total sales</div>                <div class="text-xs text-gray-500">Total sales</div>

                            <label class="block text-sm text-gray-400 mb-2">Event Title</label>

                            <input type="text" placeholder="Concert at Ziggodome"            </div>            </div>

                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">

                        </div>

                        <div>

                            <label class="block text-sm text-gray-400 mb-2">Event Date</label>            <div class="bg-white/5 rounded-2xl p-6 border border-white/10">            <div class="bg-white/5 rounded-2xl p-6 border border-white/10">

                            <input type="date"

                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">                <div class="text-sm text-gray-400 mb-2">Total Revenue</div>                <div class="text-sm text-gray-400 mb-2">Total Revenue</div>

                        </div>

                        <div>                <div class="text-3xl font-bold mb-1">${{ number_format($totalRevenue) }}</div>                <div class="text-3xl font-bold mb-1">${{ number_format($totalRevenue) }}</div>

                            <label class="block text-sm text-gray-400 mb-2">Location</label>

                            <input type="text" placeholder="Ziggodome, Amsterdam"                <div class="text-xs text-gray-500">Gross earnings</div>                <div class="text-xs text-gray-500">Gross earnings</div>

                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">

                        </div>            </div>            </div>

                        <div>

                            <label class="block text-sm text-gray-400 mb-2">Max Capacity</label>        </div>        </div>

                            <input type="number" placeholder="17000"

                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">

                        </div>

                    </div>        <!-- Navigation Tabs -->        <!-- Navigation Tabs -->

                    <div>

                        <label class="block text-sm text-gray-400 mb-2">Description</label>        <div class="flex gap-3 mb-8 overflow-x-auto pb-3 scrollbar-hide">        <div class="flex gap-3 mb-8 overflow-x-auto pb-3 scrollbar-hide">

                        <textarea rows="4" placeholder="Event description..."

                                  class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition resize-none"></textarea>            <button onclick="showTab('events')" id="events-tab" class="tab-btn active px-6 py-3 bg-white text-black rounded-full text-sm font-semibold whitespace-nowrap transition">            <button onclick="showTab('events')" id="events-tab" class="tab-btn active px-6 py-3 bg-white text-black rounded-full text-sm font-semibold whitespace-nowrap transition">

                    </div>

                    <div class="flex gap-4">                Events                Events

                        <button type="submit" class="px-8 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition">

                            Create Event            </button>            </button>

                        </button>

                        <button type="button" onclick="toggleCreateForm()" class="px-8 py-3 border border-white/20 rounded-full font-medium hover:bg-white/5 transition">            <button onclick="showTab('users')" id="users-tab" class="tab-btn px-6 py-3 bg-white/5 hover:bg-white/10 rounded-full text-sm font-medium whitespace-nowrap transition border border-white/10">            <button onclick="showTab('users')" id="users-tab" class="tab-btn px-6 py-3 bg-white/5 hover:bg-white/10 rounded-full text-sm font-medium whitespace-nowrap transition border border-white/10">

                            Cancel

                        </button>                Users                Users

                    </div>

                </form>            </button>            </button>

            </div>

            <button onclick="showTab('analytics')" id="analytics-tab" class="tab-btn px-6 py-3 bg-white/5 hover:bg-white/10 rounded-full text-sm font-medium whitespace-nowrap transition border border-white/10">            <button onclick="showTab('analytics')" id="analytics-tab" class="tab-btn px-6 py-3 bg-white/5 hover:bg-white/10 rounded-full text-sm font-medium whitespace-nowrap transition border border-white/10">

            <!-- Events List -->

            <div class="space-y-4">                Analytics                Analytics

                @foreach($recentEvents as $event)

                <div class="bg-white/5 rounded-2xl p-6 border border-white/10 hover:border-white/20 transition">            </button>            </button>

                    <div class="flex justify-between items-start mb-4">

                        <div class="flex-1">            <button onclick="showTab('settings')" id="settings-tab" class="tab-btn px-6 py-3 bg-white/5 hover:bg-white/10 rounded-full text-sm font-medium whitespace-nowrap transition border border-white/10">            <button onclick="showTab('settings')" id="settings-tab" class="tab-btn px-6 py-3 bg-white/5 hover:bg-white/10 rounded-full text-sm font-medium whitespace-nowrap transition border border-white/10">

                            <div class="flex items-center gap-3 mb-2">

                                <h3 class="text-xl font-bold">{{ $event['title'] }}</h3>                Settings                Settings

                                @if($event['status'] === 'active')

                                    <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-semibold border border-green-500/30">Active</span>            </button>            </button>

                                @else

                                    <span class="px-3 py-1 bg-red-500/20 text-red-400 rounded-full text-xs font-semibold border border-red-500/30">Sold Out</span>        </div>        </div>

                                @endif

                            </div>

                            <p class="text-gray-400 text-sm mb-1">{{ $event['location'] }}</p>

                            <p class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($event['date'])->format('M j, Y') }}</p>        <!-- Events Tab -->        <!-- Events Tab -->

                        </div>

                    </div>        <div id="events-content" class="tab-content">        <div id="events-content" class="tab-content">

                    

                    <div class="grid grid-cols-3 gap-4 mb-4 pt-4 border-t border-white/10">            <!-- Create Event Button -->            <!-- Create Event Button -->

                        <div>

                            <div class="text-xs text-gray-500 mb-1">Tickets Sold</div>            <div class="mb-8 flex justify-between items-center">            <div class="mb-8 flex justify-between items-center">

                            <div class="font-semibold">{{ number_format($event['tickets_sold']) }}/{{ number_format($event['capacity']) }}</div>

                        </div>                <h2 class="text-2xl font-bold">Event Management</h2>                <h2 class="text-2xl font-bold">Event Management</h2>

                        <div>

                            <div class="text-xs text-gray-500 mb-1">Revenue</div>                <button onclick="toggleCreateForm()" class="px-6 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition">                <button onclick="toggleCreateForm()" class="px-6 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition">

                            <div class="font-semibold">${{ number_format($event['revenue']) }}</div>

                        </div>                    + Create Event                    + Create Event

                        <div>

                            <div class="text-xs text-gray-500 mb-1">Fill Rate</div>                </button>                </button>

                            <div class="font-semibold">{{ round(($event['tickets_sold'] / $event['capacity']) * 100) }}%</div>

                        </div>            </div>            </div>

                    </div>

                    

                    <div class="flex gap-3">

                        <button class="px-4 py-2 bg-white/10 rounded-lg text-sm font-medium hover:bg-white/20 transition">            <!-- Create Event Form (Hidden by default) -->            <!-- Create Event Form (Hidden by default) -->

                            Edit

                        </button>            <div id="createEventForm" class="bg-white/5 rounded-2xl p-6 border border-white/10 mb-8 hidden">            <div id="createEventForm" class="bg-white/5 rounded-2xl p-6 border border-white/10 mb-8 hidden">

                        <button class="px-4 py-2 bg-white/10 rounded-lg text-sm font-medium hover:bg-white/20 transition">

                            View Details                <h3 class="text-xl font-semibold mb-6">Create New Event</h3>                <h3 class="text-xl font-semibold mb-6">Create New Event</h3>

                        </button>

                        <button class="px-4 py-2 bg-red-500/20 text-red-400 rounded-lg text-sm font-medium hover:bg-red-500/30 transition">                <form class="space-y-6">                <form class="space-y-6">

                            Delete

                        </button>                    <div class="grid md:grid-cols-2 gap-6">                    <div class="grid md:grid-cols-2 gap-6">

                    </div>

                </div>                        <div>                        <div>

                @endforeach

            </div>                            <label class="block text-sm text-gray-400 mb-2">Event Title</label>                            <label class="block text-sm text-gray-400 mb-2">Event Title</label>

        </div>

                            <input type="text" placeholder="Concert at Ziggodome"                            <input type="text" placeholder="Concert at Ziggodome"

        <!-- Users Tab -->

        <div id="users-content" class="tab-content hidden">                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">

            <div class="mb-8 flex justify-between items-center">

                <h2 class="text-2xl font-bold">User Management</h2>                        </div>                        </div>

                <input type="text" placeholder="Search users..." 

                       class="px-4 py-2 bg-white/5 border border-white/10 rounded-full focus:outline-none focus:border-white/20 transition">                        <div>                        <div>

            </div>

                            <label class="block text-sm text-gray-400 mb-2">Event Date</label>                            <label class="block text-sm text-gray-400 mb-2">Event Date</label>

            <div class="bg-white/5 rounded-2xl border border-white/10 overflow-hidden">

                <div class="overflow-x-auto">                            <input type="date"                            <input type="date"

                    <table class="w-full">

                        <thead>                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">

                            <tr class="border-b border-white/10">

                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">User</th>                        </div>                        </div>

                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Email</th>

                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Events</th>                        <div>                        <div>

                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Status</th>

                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Actions</th>                            <label class="block text-sm text-gray-400 mb-2">Location</label>                            <label class="block text-sm text-gray-400 mb-2">Location</label>

                            </tr>

                        </thead>                            <input type="text" placeholder="Ziggodome, Amsterdam"                            <input type="text" placeholder="Ziggodome, Amsterdam"

                        <tbody class="divide-y divide-white/10">

                            <tr>                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">

                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">                        </div>                        </div>

                                        <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center font-semibold">JD</div>

                                        <span class="font-medium">John Doe</span>                        <div>                        <div>

                                    </div>

                                </td>                            <label class="block text-sm text-gray-400 mb-2">Max Capacity</label>                            <label class="block text-sm text-gray-400 mb-2">Max Capacity</label>

                                <td class="px-6 py-4 text-gray-400">john.doe@example.com</td>

                                <td class="px-6 py-4 text-gray-400">24</td>                            <input type="number" placeholder="17000"                            <input type="number" placeholder="17000"

                                <td class="px-6 py-4">

                                    <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-semibold">Active</span>                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">

                                </td>

                                <td class="px-6 py-4">                        </div>                        </div>

                                    <button class="text-sm text-gray-400 hover:text-white transition">View</button>

                                </td>                    </div>                    </div>

                            </tr>

                            <tr>                    <div>                    <div>

                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">                        <label class="block text-sm text-gray-400 mb-2">Description</label>                        <label class="block text-sm text-gray-400 mb-2">Description</label>

                                        <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center font-semibold">AS</div>

                                        <span class="font-medium">Alice Smith</span>                        <textarea rows="4" placeholder="Event description..."                        <textarea rows="4" placeholder="Event description..."

                                    </div>

                                </td>                                  class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition resize-none"></textarea>                                  class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition resize-none"></textarea>

                                <td class="px-6 py-4 text-gray-400">alice@example.com</td>

                                <td class="px-6 py-4 text-gray-400">18</td>                    </div>                    </div>

                                <td class="px-6 py-4">

                                    <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-semibold">Active</span>                    <div class="flex gap-4">                    <div class="flex gap-4">

                                </td>

                                <td class="px-6 py-4">                        <button type="submit" class="px-8 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition">                        <button type="submit" class="px-8 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition">

                                    <button class="text-sm text-gray-400 hover:text-white transition">View</button>

                                </td>                            Create Event                            Create Event

                            </tr>

                        </tbody>                        </button>                        </button>

                    </table>

                </div>                        <button type="button" onclick="toggleCreateForm()" class="px-8 py-3 border border-white/20 rounded-full font-medium hover:bg-white/5 transition">                        <button type="button" onclick="toggleCreateForm()" class="px-8 py-3 border border-white/20 rounded-full font-medium hover:bg-white/5 transition">

            </div>

        </div>                            Cancel                            Cancel



        <!-- Analytics Tab -->                        </button>                        </button>

        <div id="analytics-content" class="tab-content hidden">

            <h2 class="text-2xl font-bold mb-8">Analytics & Reports</h2>                    </div>                    </div>

            

            <div class="grid lg:grid-cols-2 gap-6">                </form>                </form>

                <div class="bg-white/5 rounded-2xl p-6 border border-white/10">

                    <h3 class="text-lg font-semibold mb-6">Top Performing Events</h3>            </div>            </div>

                    <div class="space-y-4">

                        @foreach($recentEvents as $index => $event)

                        <div class="flex items-center justify-between p-4 bg-white/5 rounded-xl">

                            <div>            <!-- Events List -->            <!-- Events List -->

                                <div class="font-medium mb-1">{{ $event['title'] }}</div>

                                <div class="text-sm text-gray-400">${{ number_format($event['revenue']) }} revenue</div>            <div class="space-y-4">            <div class="space-y-4">

                            </div>

                            <div class="text-2xl font-bold text-gray-500">#{{ $index + 1 }}</div>                @foreach($recentEvents as $event)                @foreach($recentEvents as $event)

                        </div>

                        @endforeach                <div class="bg-white/5 rounded-2xl p-6 border border-white/10 hover:border-white/20 transition">                <div class="bg-white/5 rounded-2xl p-6 border border-white/10 hover:border-white/20 transition">

                    </div>

                </div>                    <div class="flex justify-between items-start mb-4">                    <div class="flex justify-between items-start mb-4">



                <div class="bg-white/5 rounded-2xl p-6 border border-white/10">                        <div class="flex-1">                        <div class="flex-1">

                    <h3 class="text-lg font-semibold mb-6">Revenue Chart</h3>

                    <div class="h-64 flex items-center justify-center bg-white/5 rounded-xl">                            <div class="flex items-center gap-3 mb-2">                            <div class="flex items-center gap-3 mb-2">

                        <div class="text-center text-gray-400">

                            <div class="text-4xl mb-2">📊</div>                                <h3 class="text-xl font-bold">{{ $event['title'] }}</h3>                                <h3 class="text-xl font-bold">{{ $event['title'] }}</h3>

                            <p class="text-sm">Chart visualization</p>

                            <p class="text-xs text-gray-500">(Will be connected to analytics later)</p>                                @if($event['status'] === 'active')                                @if($event['status'] === 'active')

                        </div>

                    </div>                                    <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-semibold border border-green-500/30">Active</span>                                    <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-semibold border border-green-500/30">Active</span>

                </div>

            </div>                                @else                                @else

        </div>

                                    <span class="px-3 py-1 bg-red-500/20 text-red-400 rounded-full text-xs font-semibold border border-red-500/30">Sold Out</span>                                    <span class="px-3 py-1 bg-red-500/20 text-red-400 rounded-full text-xs font-semibold border border-red-500/30">Sold Out</span>

        <!-- Settings Tab -->

        <div id="settings-content" class="tab-content hidden">                                @endif                                @endif

            <h2 class="text-2xl font-bold mb-8">CMS Settings</h2>

                                        </div>                            </div>

            <div class="max-w-2xl">

                <div class="bg-white/5 rounded-2xl p-6 border border-white/10">                            <p class="text-gray-400 text-sm mb-1">{{ $event['location'] }}</p>                            <p class="text-gray-400 text-sm mb-1">{{ $event['location'] }}</p>

                    <h3 class="text-lg font-semibold mb-6">General Settings</h3>

                    <form class="space-y-6">                            <p class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($event['date'])->format('M j, Y') }}</p>                            <p class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($event['date'])->format('M j, Y') }}</p>

                        <div>

                            <label class="block text-sm text-gray-400 mb-2">Site Name</label>                        </div>                        </div>

                            <input type="text" value="Event Manager"

                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">                    </div>                    </div>

                        </div>

                        <div>                                        

                            <label class="block text-sm text-gray-400 mb-2">Contact Email</label>

                            <input type="email" value="admin@eventmanager.com"                    <div class="grid grid-cols-3 gap-4 mb-4 pt-4 border-t border-white/10">                    <div class="grid grid-cols-3 gap-4 mb-4 pt-4 border-t border-white/10">

                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">

                        </div>                        <div>                        <div>

                        <div>

                            <label class="block text-sm text-gray-400 mb-2">Default Event Capacity</label>                            <div class="text-xs text-gray-500 mb-1">Tickets Sold</div>                            <div class="text-xs text-gray-500 mb-1">Tickets Sold</div>

                            <input type="number" value="1000"

                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">                            <div class="font-semibold">{{ number_format($event['tickets_sold']) }}/{{ number_format($event['capacity']) }}</div>                            <div class="font-semibold">{{ number_format($event['tickets_sold']) }}/{{ number_format($event['capacity']) }}</div>

                        </div>

                        <div class="flex justify-end">                        </div>                        </div>

                            <button type="submit" class="px-8 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition">

                                Save Settings                        <div>                        <div>

                            </button>

                        </div>                            <div class="text-xs text-gray-500 mb-1">Revenue</div>                            <div class="text-xs text-gray-500 mb-1">Revenue</div>

                    </form>

                </div>                            <div class="font-semibold">${{ number_format($event['revenue']) }}</div>                            <div class="font-semibold">${{ number_format($event['revenue']) }}</div>

            </div>

        </div>                        </div>                        </div>



    </div>                        <div>                        <div>

</div>

                            <div class="text-xs text-gray-500 mb-1">Fill Rate</div>                            <div class="text-xs text-gray-500 mb-1">Fill Rate</div>

<style>

    .scrollbar-hide::-webkit-scrollbar {                            <div class="font-semibold">{{ round(($event['tickets_sold'] / $event['capacity']) * 100) }}%</div>                            <div class="font-semibold">{{ round(($event['tickets_sold'] / $event['capacity']) * 100) }}%</div>

        display: none;

    }                        </div>                        </div>

    

    .scrollbar-hide {                    </div>                    </div>

        -ms-overflow-style: none;

        scrollbar-width: none;                                        

    }

</style>                    <div class="flex gap-3">                    <div class="flex gap-3">



<script>                        <button class="px-4 py-2 bg-white/10 rounded-lg text-sm font-medium hover:bg-white/20 transition">                        <button class="px-4 py-2 bg-white/10 rounded-lg text-sm font-medium hover:bg-white/20 transition">

    function showTab(tabName) {

        // Hide all tab contents                            Edit                            Edit

        document.querySelectorAll('.tab-content').forEach(content => {

            content.classList.add('hidden');                        </button>                        </button>

        });

                        <button class="px-4 py-2 bg-white/10 rounded-lg text-sm font-medium hover:bg-white/20 transition">                        <button class="px-4 py-2 bg-white/10 rounded-lg text-sm font-medium hover:bg-white/20 transition">

        // Show selected tab content

        document.getElementById(tabName + '-content').classList.remove('hidden');                            View Details                            View Details



        // Update tab button styling                        </button>                        </button>

        document.querySelectorAll('.tab-btn').forEach(btn => {

            btn.classList.remove('active', 'bg-white', 'text-black', 'font-semibold');                        <button class="px-4 py-2 bg-red-500/20 text-red-400 rounded-lg text-sm font-medium hover:bg-red-500/30 transition">                        <button class="px-4 py-2 bg-red-500/20 text-red-400 rounded-lg text-sm font-medium hover:bg-red-500/30 transition">

            btn.classList.add('bg-white/5', 'text-white', 'font-medium', 'border', 'border-white/10');

        });                            Delete                            Delete



        // Add active styles to selected tab                        </button>                        </button>

        const activeTab = document.getElementById(tabName + '-tab');

        activeTab.classList.remove('bg-white/5', 'text-white', 'font-medium', 'border', 'border-white/10');                    </div>                    </div>

        activeTab.classList.add('active', 'bg-white', 'text-black', 'font-semibold');

    }                </div>                </div>



    function toggleCreateForm() {                @endforeach                @endforeach

        const form = document.getElementById('createEventForm');

        form.classList.toggle('hidden');            </div>            </div>

    }

        </div>        </div>

    // Initialize forms to show placeholder alert on submit

    document.addEventListener('DOMContentLoaded', function() {

        const forms = document.querySelectorAll('form');

        forms.forEach(form => {        <!-- Users Tab -->        <!-- Users Tab -->

            form.addEventListener('submit', function(e) {

                e.preventDefault();        <div id="users-content" class="tab-content hidden">        <div id="users-content" class="tab-content hidden">

                alert('✅ Form submitted! This functionality will be connected to the database later.');

            });            <div class="mb-8 flex justify-between items-center">            <div class="mb-8 flex justify-between items-center">

        });

    });                <h2 class="text-2xl font-bold">User Management</h2>                <h2 class="text-2xl font-bold">User Management</h2>

</script>

@endsection                <input type="text" placeholder="Search users..."                 <input type="text" placeholder="Search users..." 


                       class="px-4 py-2 bg-white/5 border border-white/10 rounded-full focus:outline-none focus:border-white/20 transition">                       class="px-4 py-2 bg-white/5 border border-white/10 rounded-full focus:outline-none focus:border-white/20 transition">

            </div>            </div>



            <div class="bg-white/5 rounded-2xl border border-white/10 overflow-hidden">            <div class="bg-white/5 rounded-2xl border border-white/10 overflow-hidden">

                <div class="overflow-x-auto">                <div class="overflow-x-auto">

                    <table class="w-full">                    <table class="w-full">

                        <thead>                        <thead>

                            <tr class="border-b border-white/10">                            <tr class="border-b border-white/10">

                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">User</th>                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">User</th>

                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Email</th>                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Email</th>

                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Events</th>                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Events</th>

                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Status</th>                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Status</th>

                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Actions</th>                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Actions</th>

                            </tr>                            </tr>

                        </thead>                        </thead>

                        <tbody class="divide-y divide-white/10">                        <tbody class="divide-y divide-white/10">

                            <tr>                            <tr>

                                <td class="px-6 py-4">                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">                                    <div class="flex items-center gap-3">

                                        <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center font-semibold">JD</div>                                        <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center font-semibold">JD</div>

                                        <span class="font-medium">John Doe</span>                                        <span class="font-medium">John Doe</span>

                                    </div>                                    </div>

                                </td>                                </td>

                                <td class="px-6 py-4 text-gray-400">john.doe@example.com</td>                                <td class="px-6 py-4 text-gray-400">john.doe@example.com</td>

                                <td class="px-6 py-4 text-gray-400">24</td>                                <td class="px-6 py-4 text-gray-400">24</td>

                                <td class="px-6 py-4">                                <td class="px-6 py-4">

                                    <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-semibold">Active</span>                                    <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-semibold">Active</span>

                                </td>                                </td>

                                <td class="px-6 py-4">                                <td class="px-6 py-4">

                                    <button class="text-sm text-gray-400 hover:text-white transition">View</button>                                    <button class="text-sm text-gray-400 hover:text-white transition">View</button>

                                </td>                                </td>

                            </tr>                            </tr>

                            <tr>                            <tr>

                                <td class="px-6 py-4">                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">                                    <div class="flex items-center gap-3">

                                        <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center font-semibold">AS</div>                                        <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center font-semibold">AS</div>

                                        <span class="font-medium">Alice Smith</span>                                        <span class="font-medium">Alice Smith</span>

                                    </div>                                    </div>

                                </td>                                </td>

                                <td class="px-6 py-4 text-gray-400">alice@example.com</td>                                <td class="px-6 py-4 text-gray-400">alice@example.com</td>

                                <td class="px-6 py-4 text-gray-400">18</td>                                <td class="px-6 py-4 text-gray-400">18</td>

                                <td class="px-6 py-4">                                <td class="px-6 py-4">

                                    <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-semibold">Active</span>                                    <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-semibold">Active</span>

                                </td>                                </td>

                                <td class="px-6 py-4">                                <td class="px-6 py-4">

                                    <button class="text-sm text-gray-400 hover:text-white transition">View</button>                                    <button class="text-sm text-gray-400 hover:text-white transition">View</button>

                                </td>                                </td>

                            </tr>                            </tr>

                        </tbody>                        </tbody>

                    </table>                    </table>

                </div>                </div>

            </div>            </div>

        </div>        </div>



        <!-- Analytics Tab -->        <!-- Analytics Tab -->

        <div id="analytics-content" class="tab-content hidden">        <div id="analytics-content" class="tab-content hidden">

            <h2 class="text-2xl font-bold mb-8">Analytics & Reports</h2>            <h2 class="text-2xl font-bold mb-8">Analytics & Reports</h2>

                        

            <div class="grid lg:grid-cols-2 gap-6">            <div class="grid lg:grid-cols-2 gap-6">

                <div class="bg-white/5 rounded-2xl p-6 border border-white/10">                <div class="bg-white/5 rounded-2xl p-6 border border-white/10">

                    <h3 class="text-lg font-semibold mb-6">Top Performing Events</h3>                    <h3 class="text-lg font-semibold mb-6">Top Performing Events</h3>

                    <div class="space-y-4">                    <div class="space-y-4">

                        @foreach($recentEvents as $index => $event)                        @foreach($recentEvents as $index => $event)

                        <div class="flex items-center justify-between p-4 bg-white/5 rounded-xl">                        <div class="flex items-center justify-between p-4 bg-white/5 rounded-xl">

                            <div>                            <div>

                                <div class="font-medium mb-1">{{ $event['title'] }}</div>                                <div class="font-medium mb-1">{{ $event['title'] }}</div>

                                <div class="text-sm text-gray-400">${{ number_format($event['revenue']) }} revenue</div>                                <div class="text-sm text-gray-400">${{ number_format($event['revenue']) }} revenue</div>

                            </div>                            </div>

                            <div class="text-2xl font-bold text-gray-500">#{{ $index + 1 }}</div>                            <div class="text-2xl font-bold text-gray-500">#{{ $index + 1 }}</div>

                        </div>                        </div>

                        @endforeach                        @endforeach

                    </div>                    </div>

                </div>                </div>



                <div class="bg-white/5 rounded-2xl p-6 border border-white/10">                <div class="bg-white/5 rounded-2xl p-6 border border-white/10">

                    <h3 class="text-lg font-semibold mb-6">Revenue Chart</h3>                    <h3 class="text-lg font-semibold mb-6">Revenue Chart</h3>

                    <div class="h-64 flex items-center justify-center bg-white/5 rounded-xl">                    <div class="h-64 flex items-center justify-center bg-white/5 rounded-xl">

                        <div class="text-center text-gray-400">                        <div class="text-center text-gray-400">

                            <div class="text-4xl mb-2">📊</div>                            <div class="text-4xl mb-2">📊</div>

                            <p class="text-sm">Chart visualization</p>                            <p class="text-sm">Chart visualization</p>

                            <p class="text-xs text-gray-500">(Will be connected to analytics later)</p>                            <p class="text-xs text-gray-500">(Will be connected to analytics later)</p>

                        </div>                        </div>

                    </div>                    </div>

                </div>                </div>

            </div>            </div>

        </div>        </div>



        <!-- Settings Tab -->        <!-- Settings Tab -->

        <div id="settings-content" class="tab-content hidden">        <div id="settings-content" class="tab-content hidden">

            <h2 class="text-2xl font-bold mb-8">CMS Settings</h2>            <h2 class="text-2xl font-bold mb-8">CMS Settings</h2>

                        

            <div class="max-w-2xl">            <div class="max-w-2xl">

                <div class="bg-white/5 rounded-2xl p-6 border border-white/10">                <div class="bg-white/5 rounded-2xl p-6 border border-white/10">

                    <h3 class="text-lg font-semibold mb-6">General Settings</h3>                    <h3 class="text-lg font-semibold mb-6">General Settings</h3>

                    <form class="space-y-6">                    <form class="space-y-6">

                        <div>                        <div>

                            <label class="block text-sm text-gray-400 mb-2">Site Name</label>                            <label class="block text-sm text-gray-400 mb-2">Site Name</label>

                            <input type="text" value="Event Manager"                            <input type="text" value="Event Manager"

                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">

                        </div>                        </div>

                        <div>                        <div>

                            <label class="block text-sm text-gray-400 mb-2">Contact Email</label>                            <label class="block text-sm text-gray-400 mb-2">Contact Email</label>

                            <input type="email" value="admin@eventmanager.com"                            <input type="email" value="admin@eventmanager.com"

                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">

                        </div>                        </div>

                        <div>                        <div>

                            <label class="block text-sm text-gray-400 mb-2">Default Event Capacity</label>                            <label class="block text-sm text-gray-400 mb-2">Default Event Capacity</label>

                            <input type="number" value="1000"                            <input type="number" value="1000"

                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">

                        </div>                        </div>

                        <div class="flex justify-end">                        <div class="flex justify-end">

                            <button type="submit" class="px-8 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition">                            <button type="submit" class="px-8 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition">

                                Save Settings                                Save Settings

                            </button>                            </button>

                        </div>                        </div>

                    </form>                    </form>

                </div>                </div>

            </div>            </div>

        </div>        </div>



    </div>    </div>

</div></div>



<style><style>

    .scrollbar-hide::-webkit-scrollbar {    .scrollbar-hide::-webkit-scrollbar {

        display: none;        display: none;

    }    }

        

    .scrollbar-hide {    .scrollbar-hide {

        -ms-overflow-style: none;        -ms-overflow-style: none;

        scrollbar-width: none;        scrollbar-width: none;

    }    }

</style></style>



<script><script>

    function showTab(tabName) {    function showTab(tabName) {

        // Hide all tab contents        // Hide all tab contents

        document.querySelectorAll('.tab-content').forEach(content => {        document.querySelectorAll('.tab-content').forEach(content => {

            content.classList.add('hidden');            content.classList.add('hidden');

        });        });



        // Show selected tab content        // Show selected tab content

        document.getElementById(tabName + '-content').classList.remove('hidden');        document.getElementById(tabName + '-content').classList.remove('hidden');



        // Update tab button styling        // Update tab button styling

        document.querySelectorAll('.tab-btn').forEach(btn => {        document.querySelectorAll('.tab-btn').forEach(btn => {

            btn.classList.remove('active', 'bg-white', 'text-black', 'font-semibold');            btn.classList.remove('active', 'bg-white', 'text-black', 'font-semibold');

            btn.classList.add('bg-white/5', 'text-white', 'font-medium', 'border', 'border-white/10');            btn.classList.add('bg-white/5', 'text-white', 'font-medium', 'border', 'border-white/10');

        });        });



        // Add active styles to selected tab        // Add active styles to selected tab

        const activeTab = document.getElementById(tabName + '-tab');        const activeTab = document.getElementById(tabName + '-tab');

        activeTab.classList.remove('bg-white/5', 'text-white', 'font-medium', 'border', 'border-white/10');        activeTab.classList.remove('bg-white/5', 'text-white', 'font-medium', 'border', 'border-white/10');

        activeTab.classList.add('active', 'bg-white', 'text-black', 'font-semibold');        activeTab.classList.add('active', 'bg-white', 'text-black', 'font-semibold');

    }    }



    function toggleCreateForm() {    function toggleCreateForm() {

        const form = document.getElementById('createEventForm');        const form = document.getElementById('createEventForm');

        form.classList.toggle('hidden');        form.classList.toggle('hidden');

    }    }



    // Initialize forms to show placeholder alert on submit    // Initialize forms to show placeholder alert on submit

    document.addEventListener('DOMContentLoaded', function() {    document.addEventListener('DOMContentLoaded', function() {

        const forms = document.querySelectorAll('form');        const forms = document.querySelectorAll('form');

        forms.forEach(form => {        forms.forEach(form => {

            form.addEventListener('submit', function(e) {            form.addEventListener('submit', function(e) {

                e.preventDefault();                e.preventDefault();

                alert('✅ Form submitted! This functionality will be connected to the database later.');                alert('This functionality will be connected to the database later!');

            });            });

        });        });

    });    });

</script></script>

@endsection@endsection

    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <!-- Logo and Title -->
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Event Manager CMS</h1>
                            <p class="text-gray-600">Admin Dashboard</p>
                        </div>
                    </div>

                    <!-- Header Actions -->
                    <div class="flex items-center space-x-4">
                        <button class="p-2 text-gray-400 hover:text-gray-600 relative">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                        </button>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                AD
                            </div>
                            <span class="text-gray-700 font-medium">Admin</span>
                        </div>
                        <a href="{{ route('account') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 border border-gray-300 rounded-lg">
                            User View
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex">
            <!-- Sidebar -->
            <aside class="w-64 bg-white shadow-sm min-h-screen border-r border-gray-200">
                <nav class="p-6">
                    <ul class="space-y-2">
                        <li>
                            <button onclick="showTab('dashboard')" id="dashboard-nav" class="nav-item w-full text-left px-4 py-3 rounded-lg bg-blue-50 text-blue-700 font-medium">
                                <i class="fas fa-chart-line mr-3"></i>Dashboard
                            </button>
                        </li>
                        <li>
                            <button onclick="showTab('events')" id="events-nav" class="nav-item w-full text-left px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-50 font-medium">
                                <i class="fas fa-calendar-alt mr-3"></i>Event Management
                            </button>
                        </li>
                        <li>
                            <button onclick="showTab('users')" id="users-nav" class="nav-item w-full text-left px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-50 font-medium">
                                <i class="fas fa-users mr-3"></i>User Management
                            </button>
                        </li>
                        <li>
                            <button onclick="showTab('analytics')" id="analytics-nav" class="nav-item w-full text-left px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-50 font-medium">
                                <i class="fas fa-chart-bar mr-3"></i>Analytics
                            </button>
                        </li>
                        <li>
                            <button onclick="showTab('settings')" id="settings-nav" class="nav-item w-full text-left px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-50 font-medium">
                                <i class="fas fa-cog mr-3"></i>Settings
                            </button>
                        </li>
                    </ul>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-8">
                <!-- Dashboard Tab -->
                <div id="dashboard-content" class="tab-content">
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">Dashboard Overview</h2>
                        <p class="text-gray-600">Welcome to the Event Manager CMS. Here's your current statistics.</p>
                    </div>

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-calendar text-blue-600 text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-2xl font-bold text-gray-900">{{ $totalEvents }}</h3>
                                    <p class="text-gray-600">Total Events</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-users text-green-600 text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-2xl font-bold text-gray-900">{{ number_format($totalUsers) }}</h3>
                                    <p class="text-gray-600">Registered Users</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-ticket-alt text-orange-600 text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-2xl font-bold text-gray-900">{{ number_format($totalTicketsSold) }}</h3>
                                    <p class="text-gray-600">Tickets Sold</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-dollar-sign text-purple-600 text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-2xl font-bold text-gray-900">${{ number_format($totalRevenue) }}</h3>
                                    <p class="text-gray-600">Total Revenue</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Events -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">Recent Events</h3>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sales</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Revenue</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($recentEvents as $event)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">{{ $event['title'] }}</div>
                                                <div class="text-sm text-gray-500">{{ $event['location'] }}</div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ \Carbon\Carbon::parse($event['date'])->format('M j, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ number_format($event['tickets_sold']) }}/{{ number_format($event['capacity']) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            ${{ number_format($event['revenue']) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($event['status'] === 'active')
                                                <span class="px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">Active</span>
                                            @elseif($event['status'] === 'sold_out')
                                                <span class="px-2 py-1 text-xs font-semibold bg-red-100 text-red-800 rounded-full">Sold Out</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                                            <button class="text-red-600 hover:text-red-900">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Event Management Tab -->
                <div id="events-content" class="tab-content hidden">
                    <div class="mb-8 flex justify-between items-center">
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-2">Event Management</h2>
                            <p class="text-gray-600">Create, edit, and manage your events.</p>
                        </div>
                        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium">
                            <i class="fas fa-plus mr-2"></i>Create New Event
                        </button>
                    </div>

                    <!-- Event Creation Form -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Create New Event</h3>
                        <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Event Title</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter event title">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Event Date</label>
                                <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Event location">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Max Capacity</label>
                                <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Maximum attendees">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Event description"></textarea>
                            </div>
                            <div class="md:col-span-2 flex justify-end">
                                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium">
                                    Create Event
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Events List -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">All Events</h3>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                @foreach($recentEvents as $event)
                                <div class="border border-gray-200 rounded-lg p-4">
                                    <div class="flex justify-between items-start mb-3">
                                        <h4 class="font-semibold text-gray-900">{{ $event['title'] }}</h4>
                                        <span class="px-2 py-1 text-xs font-semibold bg-{{ $event['status'] === 'active' ? 'green' : 'red' }}-100 text-{{ $event['status'] === 'active' ? 'green' : 'red' }}-800 rounded-full">
                                            {{ ucfirst(str_replace('_', ' ', $event['status'])) }}
                                        </span>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-2">{{ $event['location'] }}</p>
                                    <p class="text-sm text-gray-600 mb-4">{{ \Carbon\Carbon::parse($event['date'])->format('F j, Y') }}</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm font-medium text-gray-900">${{ number_format($event['revenue']) }} revenue</span>
                                        <div class="flex space-x-2">
                                            <button class="px-3 py-1 text-sm bg-blue-100 text-blue-700 rounded hover:bg-blue-200">Edit</button>
                                            <button class="px-3 py-1 text-sm bg-red-100 text-red-700 rounded hover:bg-red-200">Delete</button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Management Tab -->
                <div id="users-content" class="tab-content hidden">
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">User Management</h2>
                        <p class="text-gray-600">Manage registered users and their permissions.</p>
                    </div>

                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-900">Registered Users</h3>
                            <div class="flex items-center space-x-4">
                                <input type="text" placeholder="Search users..." class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium">
                                    <i class="fas fa-plus mr-2"></i>Add User
                                </button>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Registration Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Events Attended</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold">JD</div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">John Doe</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">john.doe@example.com</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Jan 15, 2022</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">24</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">Active</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                                            <button class="text-red-600 hover:text-red-900">Suspend</button>
                                        </td>
                                    </tr>
                                    <!-- More user rows would go here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Analytics Tab -->
                <div id="analytics-content" class="tab-content hidden">
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">Analytics & Reports</h2>
                        <p class="text-gray-600">Detailed insights and performance metrics.</p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Revenue Chart Placeholder -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Revenue Over Time</h3>
                            <div class="h-64 bg-gray-100 rounded-lg flex items-center justify-center">
                                <div class="text-center text-gray-500">
                                    <i class="fas fa-chart-line text-4xl mb-4"></i>
                                    <p>Revenue chart would be displayed here</p>
                                    <p class="text-sm">(Integration with Chart.js recommended)</p>
                                </div>
                            </div>
                        </div>

                        <!-- Event Performance -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Top Performing Events</h3>
                            <div class="space-y-4">
                                @foreach($recentEvents as $index => $event)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div>
                                        <h4 class="font-medium text-gray-900">{{ $event['title'] }}</h4>
                                        <p class="text-sm text-gray-600">${{ number_format($event['revenue']) }} revenue</p>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-lg font-bold text-gray-900">#{{ $index + 1 }}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Settings Tab -->
                <div id="settings-content" class="tab-content hidden">
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">CMS Settings</h2>
                        <p class="text-gray-600">Configure your event management system.</p>
                    </div>

                    <div class="max-w-2xl">
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">General Settings</h3>
                            <form class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Site Name</label>
                                    <input type="text" value="Event Manager" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Contact Email</label>
                                    <input type="email" value="admin@eventmanager.com" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Default Event Capacity</label>
                                    <input type="number" value="1000" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium">
                                        Save Settings
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function showTab(tabName) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });

            // Show selected tab content
            document.getElementById(tabName + '-content').classList.remove('hidden');

            // Update navigation styling
            document.querySelectorAll('.nav-item').forEach(item => {
                item.classList.remove('bg-blue-50', 'text-blue-700');
                item.classList.add('text-gray-700', 'hover:bg-gray-50');
            });

            // Add active styles to selected nav item
            const activeNav = document.getElementById(tabName + '-nav');
            activeNav.classList.remove('text-gray-700', 'hover:bg-gray-50');
            activeNav.classList.add('bg-blue-50', 'text-blue-700');
        }
    </script>
</body>

</html>
