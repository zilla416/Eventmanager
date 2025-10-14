@extends('layouts.app')

@section('title', 'Organizer Dashboard')

@section('content')
<div class="min-h-screen bg-black text-white">
    <!-- Header -->
    <div class="bg-white/5 border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6">
                <div>
                    <h1 class="text-5xl font-bold mb-3">Dashboard</h1>
                    <p class="text-gray-400 text-lg">Welcome back, {{ $organizerName }}</p>
                </div>
                <a href="{{ route('organizer.events.create') }}" class="px-8 py-4 bg-white text-black rounded-xl font-semibold hover:bg-gray-200 transition-all hover:scale-105 shadow-lg">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Create New Event
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Events -->
            <div class="bg-white/5 rounded-2xl p-6 border border-white/10 hover:border-white/20 transition group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm mb-2 font-medium">Total Events</p>
                        <p class="text-5xl font-bold mb-1">{{ $totalOrganizerEvents }}</p>
                        <p class="text-xs text-gray-500">All time</p>
                    </div>
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Tickets Sold -->
            <div class="bg-white/5 rounded-2xl p-6 border border-white/10 hover:border-white/20 transition group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm mb-2 font-medium">Tickets Sold</p>
                        <p class="text-5xl font-bold mb-1">{{ number_format($totalOrganizerTickets) }}</p>
                        <p class="text-xs text-gray-500">Across all events</p>
                    </div>
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-500 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Revenue -->
            <div class="bg-white/5 rounded-2xl p-6 border border-white/10 hover:border-white/20 transition group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm mb-2 font-medium">Total Revenue</p>
                        <p class="text-5xl font-bold mb-1">€{{ number_format($totalOrganizerRevenue, 2) }}</p>
                        <p class="text-xs text-gray-500">Total earnings</p>
                    </div>
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Events List -->
        <div class="bg-white/5 rounded-2xl border border-white/10 overflow-hidden">
            <div class="p-6 border-b border-white/10 flex justify-between items-center">
                <h2 class="text-2xl font-bold">Your Events</h2>
                <span class="text-sm text-gray-400">{{ count($organizerEvents) }} {{ count($organizerEvents) == 1 ? 'event' : 'events' }}</span>
            </div>

            @if(count($organizerEvents) === 0)
                <div class="p-12 text-center">
                    <div class="bg-gradient-to-br from-purple-500 to-pink-500 rounded-full p-8 inline-block mb-6">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-2">No Events Yet</h3>
                    <p class="text-gray-400 mb-6">Start by creating your first event and reach your audience</p>
                    <a href="{{ route('organizer.events.create') }}" class="inline-block px-8 py-4 bg-white text-black rounded-xl font-semibold hover:bg-gray-200 transition-all hover:scale-105 shadow-lg">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Create Your First Event
                    </a>
                </div>
            @else
                <div class="divide-y divide-white/10">
                    @foreach($organizerEvents as $event)
                        <div class="p-6 hover:bg-white/[0.02] transition-colors">
                            <div class="flex items-start justify-between gap-6">
                                <!-- Event Info -->
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-3">
                                        <h3 class="text-2xl font-bold">{{ $event['title'] }}</h3>
                                        @if($event['status'] === 'active')
                                            <span class="px-3 py-1.5 bg-white/10 text-white rounded-lg text-xs font-semibold border border-white/20">Active</span>
                                        @else
                                            <span class="px-3 py-1.5 bg-white/5 text-gray-400 rounded-lg text-xs font-semibold border border-white/10">Sold Out</span>
                                        @endif
                                    </div>
                                    
                                    <div class="flex flex-wrap items-center gap-6 text-sm text-gray-400 mb-6">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <span class="font-medium">{{ \Carbon\Carbon::parse($event['date'])->format('M d, Y') }}</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            <span class="font-medium">{{ $event['location'] }}</span>
                                        </div>
                                    </div>

                                    <!-- Stats Row -->
                                    <div class="grid grid-cols-2 gap-6">
                                        <!-- Tickets Sold -->
                                        <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                                            <p class="text-xs text-gray-400 mb-2 font-medium uppercase tracking-wide">Tickets Sold</p>
                                            <p class="text-2xl font-bold mb-2">{{ $event['tickets_sold'] }} <span class="text-sm text-gray-400 font-normal">/ {{ $event['max_spots'] }}</span></p>
                                            <div class="w-full bg-white/10 rounded-full h-2">
                                                <div class="bg-white h-2 rounded-full transition-all" style="width: {{ $event['max_spots'] > 0 ? ($event['tickets_sold'] / $event['max_spots'] * 100) : 0 }}%"></div>
                                            </div>
                                        </div>

                                        <!-- Revenue -->
                                        <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                                            <p class="text-xs text-gray-400 mb-2 font-medium uppercase tracking-wide">Revenue</p>
                                            <p class="text-2xl font-bold">€{{ number_format($event['revenue'], 2) }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="flex flex-col gap-2">
                                    <a href="{{ route('eventpage', ['id' => $event['id']]) }}" target="_blank" 
                                       class="p-3 bg-white/10 hover:bg-white/20 rounded-xl transition-all hover:scale-105" 
                                       title="View Event">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                    <a href="{{ route('organizer.events.edit', ['id' => $event['id']]) }}" 
                                       class="p-3 bg-white/10 hover:bg-white/20 rounded-xl transition-all hover:scale-105" 
                                       title="Edit Event">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </div>
</div>
@endsection