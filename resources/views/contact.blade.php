@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="bg-black text-white min-h-screen">
    
    <!-- Hero Section -->
    <div class="relative h-[40vh] overflow-hidden">
        <img class="w-full h-full object-cover brightness-[0.35]"
            src="https://images.unsplash.com/photo-1423666639041-f56000c27a9a?w=1200"
            alt="Contact Us">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 to-purple-600/20"></div>
        <div class="absolute inset-0 flex items-center justify-center text-center">
            <div class="max-w-4xl px-6">
                <h1 class="text-5xl md:text-7xl font-bold mb-4">Get in Touch</h1>
                <p class="text-xl text-gray-300">We're here to help with any questions or concerns</p>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-4xl mx-auto px-6 py-20">
        
        <!-- Contact Info -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold mb-8 text-center">Contact Information</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="p-8 bg-white/5 rounded-xl border border-white/10 text-center">
                    <div class="w-16 h-16 bg-blue-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Email Us</h3>
                    <a href="mailto:support@eventmanager.com" class="text-gray-400 hover:text-white transition">
                        support@eventmanager.com
                    </a>
                </div>
                
                <div class="p-8 bg-white/5 rounded-xl border border-white/10 text-center">
                    <div class="w-16 h-16 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Call Us</h3>
                    <a href="tel:+31201234567" class="text-gray-400 hover:text-white transition">
                        +31 20 123 4567
                    </a>
                    <p class="text-sm text-gray-500 mt-1">Mon-Fri, 9AM-6PM CET</p>
                </div>
                
                <div class="p-8 bg-white/5 rounded-xl border border-white/10 text-center">
                    <div class="w-16 h-16 bg-purple-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Visit Us</h3>
                    <p class="text-gray-400">
                        Amsterdam<br>Netherlands
                    </p>
                </div>
            </div>
        </div>

        <!-- Quick Help Section -->
        <div class="grid md:grid-cols-2 gap-8 mb-12">
            <div class="p-8 bg-white/5 rounded-xl border border-white/10">
                <h3 class="text-xl font-semibold mb-4">Need Quick Help?</h3>
                <p class="text-gray-400 mb-6">Check out our help center for instant answers to common questions.</p>
                <a href="{{ route('help') }}" 
                   class="inline-flex items-center gap-2 px-6 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition">
                    Visit Help Center
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
            
            <div class="p-8 bg-white/5 rounded-xl border border-white/10">
                <h3 class="text-xl font-semibold mb-4">Looking for Events?</h3>
                <p class="text-gray-400 mb-6">Browse our selection of upcoming events and find your next experience.</p>
                <a href="{{ route('homepage') }}" 
                   class="inline-flex items-center gap-2 px-6 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition">
                    Explore Events
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Response Time Notice -->
        <div class="text-center p-8 bg-blue-500/10 rounded-2xl border border-blue-500/20">
            <div class="inline-flex items-center justify-center w-12 h-12 bg-blue-500/20 rounded-full mb-4">
                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold mb-2">Fast Response Time</h3>
            <p class="text-gray-400">We typically respond to emails within 24 hours during business days</p>
        </div>

    </div>
</div>
@endsection
