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
                EventManager was built to solve a simple problem: finding and booking event tickets shouldn't be complicated. 
                We connect event-goers with organizers, making it easy to discover what's happening in your city and secure your spot.
            </p>
            <p class="text-lg text-gray-400 leading-relaxed">
                From live concerts and sporting events to theater shows and community gatherings, we handle the technical 
                side so you can focus on what matters—enjoying the experience.
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

        <!-- What We Offer -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold mb-8">What We Offer</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="p-6 bg-white/5 rounded-xl border border-white/10">
                    <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Easy Discovery</h3>
                    <p class="text-gray-400">Search and filter events by category, date, and location. Find exactly what you're looking for in seconds.</p>
                </div>
                
                <div class="p-6 bg-white/5 rounded-xl border border-white/10">
                    <div class="w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Secure Checkout</h3>
                    <p class="text-gray-400">Your payment information is encrypted and protected. Quick checkout with multiple payment options.</p>
                </div>
                
                <div class="p-6 bg-white/5 rounded-xl border border-white/10">
                    <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Digital Tickets</h3>
                    <p class="text-gray-400">Instant ticket delivery to your email. Access your tickets anytime from your account dashboard.</p>
                </div>
                
                <div class="p-6 bg-white/5 rounded-xl border border-white/10">
                    <div class="w-12 h-12 bg-orange-500/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">For Organizers</h3>
                    <p class="text-gray-400">Powerful tools to create, manage, and promote your events. Real-time analytics and attendee management.</p>
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
