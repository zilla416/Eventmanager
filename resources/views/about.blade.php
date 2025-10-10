@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="bg-black text-white min-h-screen">
    
    <!-- Hero Section -->
    <div class="relative h-[50vh] overflow-hidden">
        <img class="w-full h-full object-cover brightness-[0.35]"
            src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?w=1200"
            alt="About EventManager">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50"></div>
        <div class="absolute inset-0 flex items-center justify-center text-center">
            <div class="max-w-4xl px-6">
                <h1 class="text-5xl md:text-7xl font-bold mb-4">About EventManager</h1>
                <p class="text-xl text-gray-300">Connecting people through unforgettable experiences</p>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-4xl mx-auto px-6 py-20">
        
        <!-- Mission -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold mb-6">Our Mission</h2>
            <p class="text-lg text-gray-400 leading-relaxed mb-4">
                EventManager is dedicated to making event discovery and ticket booking simple, secure, and enjoyable. 
                We believe that great experiences bring people together and create lasting memories.
            </p>
            <p class="text-lg text-gray-400 leading-relaxed">
                Whether you're looking for concerts, sports events, theater performances, or local gatherings, 
                we're here to help you find and attend the events that matter to you.
            </p>
        </div>

        <!-- Stats -->
        <div class="grid md:grid-cols-3 gap-8 mb-16 p-8 bg-white/5 rounded-2xl border border-white/10">
            <div class="text-center">
                <p class="text-4xl font-bold mb-2">10K+</p>
                <p class="text-gray-400">Events Hosted</p>
            </div>
            <div class="text-center">
                <p class="text-4xl font-bold mb-2">500K+</p>
                <p class="text-gray-400">Tickets Sold</p>
            </div>
            <div class="text-center">
                <p class="text-4xl font-bold mb-2">50+</p>
                <p class="text-gray-400">Cities</p>
            </div>
        </div>

        <!-- Values -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold mb-8">What We Stand For</h2>
            <div class="space-y-6">
                <div class="p-6 bg-white/5 rounded-xl border border-white/10">
                    <h3 class="text-xl font-semibold mb-3">🎯 User-First Approach</h3>
                    <p class="text-gray-400">We prioritize your experience, making it easy to discover and book events you'll love.</p>
                </div>
                <div class="p-6 bg-white/5 rounded-xl border border-white/10">
                    <h3 class="text-xl font-semibold mb-3">🔒 Trust & Security</h3>
                    <p class="text-gray-400">Your data and transactions are protected with industry-leading security measures.</p>
                </div>
                <div class="p-6 bg-white/5 rounded-xl border border-white/10">
                    <h3 class="text-xl font-semibold mb-3">🌟 Quality Events</h3>
                    <p class="text-gray-400">We partner with trusted organizers to bring you the best events in your area.</p>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="text-center p-12 bg-white/5 rounded-2xl border border-white/10">
            <h2 class="text-3xl font-bold mb-4">Join Our Community</h2>
            <p class="text-gray-400 mb-8">Start discovering amazing events today</p>
            <a href="{{ route('homepage') }}" 
               class="inline-block px-8 py-4 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition-all duration-200">
                Explore Events
            </a>
        </div>

    </div>
</div>
@endsection
