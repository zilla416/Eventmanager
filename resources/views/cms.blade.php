@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="min-h-screen bg-black text-white">
    <div class="border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 md:px-8 py-6">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold mb-1">Admin Dashboard</h1>
                    <p class="text-gray-400">Manage your events and platform</p>
                </div>
                <a href="{{ route('account') }}" class="px-4 py-2 border border-white/20 rounded-full text-sm font-medium hover:bg-white/5 transition">
                    User View
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 md:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                <div class="text-sm text-gray-400 mb-2">Total Events</div>
                <div class="text-3xl font-bold mb-1">{{ $totalEvents }}</div>
                <div class="text-xs text-gray-500">All time</div>
            </div>
            <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                <div class="text-sm text-gray-400 mb-2">Registered Users</div>
                <div class="text-3xl font-bold mb-1">{{ number_format($totalUsers) }}</div>
                <div class="text-xs text-gray-500">Platform wide</div>
            </div>
            <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                <div class="text-sm text-gray-400 mb-2">Tickets Sold</div>
                <div class="text-3xl font-bold mb-1">{{ number_format($totalTicketsSold) }}</div>
                <div class="text-xs text-gray-500">Total sales</div>
            </div>
            <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                <div class="text-sm text-gray-400 mb-2">Total Revenue</div>
                <div class="text-3xl font-bold mb-1">${{ number_format($totalRevenue) }}</div>
                <div class="text-xs text-gray-500">Gross earnings</div>
            </div>
        </div>

        <div class="flex gap-3 mb-8 overflow-x-auto pb-3 scrollbar-hide">
            <button onclick="showTab('events')" id="events-tab" class="tab-btn active px-6 py-3 bg-white text-black rounded-full text-sm font-semibold whitespace-nowrap transition">Events</button>
            <button onclick="showTab('users')" id="users-tab" class="tab-btn px-6 py-3 bg-white/5 hover:bg-white/10 rounded-full text-sm font-medium whitespace-nowrap transition border border-white/10">Users</button>
            <button onclick="showTab('analytics')" id="analytics-tab" class="tab-btn px-6 py-3 bg-white/5 hover:bg-white/10 rounded-full text-sm font-medium whitespace-nowrap transition border border-white/10">Analytics</button>
            <button onclick="showTab('settings')" id="settings-tab" class="tab-btn px-6 py-3 bg-white/5 hover:bg-white/10 rounded-full text-sm font-medium whitespace-nowrap transition border border-white/10">Settings</button>
        </div>

        <div id="events-content" class="tab-content">
            <div class="mb-8 flex justify-between items-center">
                <h2 class="text-2xl font-bold">Event Management</h2>
                <button onclick="toggleCreateForm()" class="px-6 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition">+ Create Event</button>
            </div>

            <div id="createEventForm" class="bg-white/5 rounded-2xl p-6 border border-white/10 mb-8 hidden">
                <h3 class="text-xl font-semibold mb-6">Create New Event</h3>
                <form class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Event Title</label>
                            <input type="text" placeholder="Concert at Ziggodome" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Event Date</label>
                            <input type="date" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Location</label>
                            <input type="text" placeholder="Ziggodome, Amsterdam" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Max Capacity</label>
                            <input type="number" placeholder="17000" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-400 mb-2">Description</label>
                        <textarea rows="4" placeholder="Event description..." class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition resize-none"></textarea>
                    </div>
                    <div class="flex gap-4">
                        <button type="submit" class="px-8 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition">Create Event</button>
                        <button type="button" onclick="toggleCreateForm()" class="px-8 py-3 border border-white/20 rounded-full font-medium hover:bg-white/5 transition">Cancel</button>
                    </div>
                </form>
            </div>

            <div class="space-y-4">
                @foreach($recentEvents as $event)
                <div class="bg-white/5 rounded-2xl p-6 border border-white/10 hover:border-white/20 transition">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-2">
                                <h3 class="text-xl font-bold">{{ $event['title'] }}</h3>
                                @if($event['status'] === 'active')
                                    <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-semibold border border-green-500/30">Active</span>
                                @else
                                    <span class="px-3 py-1 bg-red-500/20 text-red-400 rounded-full text-xs font-semibold border border-red-500/30">Sold Out</span>
                                @endif
                            </div>
                            <p class="text-gray-400 text-sm mb-1">{{ $event['location'] }}</p>
                            <p class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($event['date'])->format('M j, Y') }}</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 mb-4 pt-4 border-t border-white/10">
                        <div>
                            <div class="text-xs text-gray-500 mb-1">Tickets Sold</div>
                            <div class="font-semibold">{{ number_format($event['tickets_sold']) }}/{{ number_format($event['capacity']) }}</div>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500 mb-1">Revenue</div>
                            <div class="font-semibold">${{ number_format($event['revenue']) }}</div>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500 mb-1">Fill Rate</div>
                            <div class="font-semibold">{{ round(($event['tickets_sold'] / $event['capacity']) * 100) }}%</div>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <button class="px-4 py-2 bg-white/10 rounded-lg text-sm font-medium hover:bg-white/20 transition">Edit</button>
                        <button class="px-4 py-2 bg-white/10 rounded-lg text-sm font-medium hover:bg-white/20 transition">View Details</button>
                        <button class="px-4 py-2 bg-red-500/20 text-red-400 rounded-lg text-sm font-medium hover:bg-red-500/30 transition">Delete</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div id="users-content" class="tab-content hidden">
            <div class="mb-8 flex justify-between items-center">
                <h2 class="text-2xl font-bold">User Management</h2>
                <input type="text" placeholder="Search users..." class="px-4 py-2 bg-white/5 border border-white/10 rounded-full focus:outline-none focus:border-white/20 transition">
            </div>
            <div class="bg-white/5 rounded-2xl border border-white/10 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-white/10">
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">User</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Email</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Events</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center font-semibold">JD</div>
                                        <span class="font-medium">John Doe</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-400">john.doe@example.com</td>
                                <td class="px-6 py-4 text-gray-400">24</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-semibold">Active</span>
                                </td>
                                <td class="px-6 py-4">
                                    <button class="text-sm text-gray-400 hover:text-white transition">View</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center font-semibold">AS</div>
                                        <span class="font-medium">Alice Smith</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-400">alice@example.com</td>
                                <td class="px-6 py-4 text-gray-400">18</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-semibold">Active</span>
                                </td>
                                <td class="px-6 py-4">
                                    <button class="text-sm text-gray-400 hover:text-white transition">View</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
