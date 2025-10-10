@extends('layouts.app')

@section('title', 'Concert')

@section('content')
<div class="min-h-screen bg-black text-white">
    <!-- Hero Image -->
    <div class="relative h-[70vh] overflow-hidden">
        <img src="{{ Vite::asset('resources/img/concert1.png') }}" 
             alt="Concert" 
             class="w-full h-full object-cover brightness-50">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
        
        <!-- Floating Info -->
        <div class="absolute bottom-0 left-0 right-0 p-8 md:p-16">
            <div class="max-w-6xl mx-auto">
                <div class="inline-block px-3 py-1 bg-white/10 backdrop-blur-md rounded-full text-xs mb-4">
                    MUSIC • LIVE
                </div>
                <h1 class="text-5xl md:text-7xl font-bold mb-4">Concert</h1>
                <div class="flex items-center gap-6 text-sm">
                    <span>Dec 1, 2025</span>
                    <span>•</span>
                    <span>19:00</span>
                    <span>•</span>
                    <span>Ziggodome</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Grid -->
    <div class="max-w-6xl mx-auto px-8 py-16">
        <div class="grid md:grid-cols-3 gap-12">
            
            <!-- Main Content -->
            <div class="md:col-span-2 space-y-12">
                
                <!-- Description -->
                <div>
                    <h2 class="text-2xl font-semibold mb-6">About</h2>
                    <div class="text-gray-400 space-y-4 leading-relaxed">
                        <p>
                            An unforgettable night at one of Amsterdam's most iconic venues. 
                            Experience world-class sound, incredible energy, and a performance 
                            you'll be talking about for years.
                        </p>
                        <p>
                            The Ziggodome has hosted legends, and this night promises to be 
                            another chapter in its storied history.
                        </p>
                    </div>
                </div>

                <!-- Venue -->
                <div>
                    <h2 class="text-2xl font-semibold mb-6">Venue</h2>
                    <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                        <h3 class="font-semibold mb-2">Ziggodome</h3>
                        <p class="text-gray-400 text-sm mb-4">De Passage 100, 1101 AX Amsterdam</p>
                        <div class="flex gap-4 text-sm text-gray-400">
                            <span>17,000 capacity</span>
                            <span>•</span>
                            <span>Metro nearby</span>
                            <span>•</span>
                            <span>Parking available</span>
                        </div>
                    </div>
                </div>

                <!-- Gallery -->
                <div>
                    <h2 class="text-2xl font-semibold mb-6">Gallery</h2>
                    <div class="grid grid-cols-3 gap-3">
                        @for ($i = 0; $i < 6; $i++)
                        <div class="aspect-square rounded-xl overflow-hidden">
                            <img src="{{ Vite::asset('resources/img/concert1.png') }}" 
                                 class="w-full h-full object-cover hover:scale-105 transition duration-300">
                        </div>
                        @endfor
                    </div>
                </div>

            </div>

            <!-- Sidebar -->
            <div class="md:col-span-1">
                <div class="sticky top-8 space-y-6">
                    
                    <!-- Price Card -->
                    <div class="bg-white text-black rounded-2xl p-6">
                        <div class="mb-6">
                            <div class="text-4xl font-bold mb-1">€89.50</div>
                            <div class="text-sm text-gray-500">per person</div>
                        </div>

                        <!-- Quantity -->
                        <div class="mb-6">
                            <label class="text-sm font-medium mb-3 block">Tickets</label>
                            <div class="flex items-center justify-between bg-gray-100 rounded-xl p-2">
                                <button class="w-10 h-10 flex items-center justify-center hover:bg-gray-200 rounded-lg transition">−</button>
                                <span class="font-medium">1</span>
                                <button class="w-10 h-10 flex items-center justify-center hover:bg-gray-200 rounded-lg transition">+</button>
                            </div>
                        </div>

                        <!-- CTA -->
                        <button class="w-full bg-black text-white py-4 rounded-xl font-medium hover:bg-gray-900 transition mb-4">
                            Reserve
                        </button>

                        <div class="text-center text-xs text-gray-500">
                            17,000 spots available
                        </div>
                    </div>

                    <!-- Features -->
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center gap-3 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Instant confirmation</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Mobile tickets</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Free cancellation</span>
                        </div>
                    </div>

                    <!-- Share -->
                    <div class="border-t border-white/10 pt-6">
                        <button class="w-full text-gray-400 py-3 rounded-xl border border-white/10 hover:bg-white/5 transition text-sm">
                            Share event
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection