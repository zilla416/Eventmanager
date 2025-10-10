@extends('layouts.app')

@section('title', 'Privacy Policy')

@section('content')
<div class="bg-black text-white min-h-screen">
    
    <!-- Hero Section -->
    <div class="relative h-[40vh] overflow-hidden">
        <img class="w-full h-full object-cover brightness-[0.35]"
            src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=1200"
            alt="Privacy Policy">
        <div class="absolute inset-0 bg-gradient-to-br from-gray-800 to-black"></div>
        <div class="absolute inset-0 flex items-center justify-center text-center">
            <div class="max-w-4xl px-6">
                <h1 class="text-5xl md:text-7xl font-bold mb-4">Privacy Policy</h1>
                <p class="text-xl text-gray-300">Last updated: October 10, 2025</p>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-4xl mx-auto px-6 py-20">
        
        <div class="prose prose-invert max-w-none">
            
            <!-- Introduction -->
            <div class="mb-12">
                <p class="text-lg text-gray-400 leading-relaxed">
                    At EventManager, we take your privacy seriously. This Privacy Policy explains how we collect, use, 
                    disclose, and safeguard your information when you use our platform.
                </p>
            </div>

            <!-- Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-4">1. Information We Collect</h2>
                <div class="space-y-4 text-gray-400">
                    <p class="leading-relaxed">We collect information that you provide directly to us, including:</p>
                    <ul class="list-disc list-inside space-y-2 ml-4">
                        <li>Name, email address, and contact information</li>
                        <li>Payment information (processed securely through third-party providers)</li>
                        <li>Event preferences and booking history</li>
                        <li>Communication preferences and marketing choices</li>
                    </ul>
                </div>
            </div>

            <!-- Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-4">2. How We Use Your Information</h2>
                <div class="space-y-4 text-gray-400">
                    <p class="leading-relaxed">We use the information we collect to:</p>
                    <ul class="list-disc list-inside space-y-2 ml-4">
                        <li>Process your ticket bookings and transactions</li>
                        <li>Send you event confirmations and important updates</li>
                        <li>Improve our platform and user experience</li>
                        <li>Recommend events that may interest you</li>
                        <li>Prevent fraud and ensure platform security</li>
                    </ul>
                </div>
            </div>

            <!-- Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-4">3. Information Sharing</h2>
                <div class="space-y-4 text-gray-400">
                    <p class="leading-relaxed">
                        We do not sell your personal information. We may share your information with:
                    </p>
                    <ul class="list-disc list-inside space-y-2 ml-4">
                        <li>Event organizers (only information necessary for your attendance)</li>
                        <li>Payment processors (to complete transactions)</li>
                        <li>Service providers who assist in operating our platform</li>
                        <li>Legal authorities when required by law</li>
                    </ul>
                </div>
            </div>

            <!-- Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-4">4. Data Security</h2>
                <div class="text-gray-400">
                    <p class="leading-relaxed">
                        We implement industry-standard security measures to protect your personal information. 
                        However, no method of transmission over the internet is 100% secure, and we cannot guarantee 
                        absolute security.
                    </p>
                </div>
            </div>

            <!-- Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-4">5. Your Rights</h2>
                <div class="space-y-4 text-gray-400">
                    <p class="leading-relaxed">You have the right to:</p>
                    <ul class="list-disc list-inside space-y-2 ml-4">
                        <li>Access and review your personal information</li>
                        <li>Request corrections to your data</li>
                        <li>Delete your account and associated data</li>
                        <li>Opt-out of marketing communications</li>
                        <li>Export your data in a portable format</li>
                    </ul>
                </div>
            </div>

            <!-- Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-4">6. Cookies and Tracking</h2>
                <div class="text-gray-400">
                    <p class="leading-relaxed">
                        We use cookies and similar tracking technologies to enhance your experience, analyze platform 
                        usage, and deliver personalized content. You can control cookie preferences through your browser settings.
                    </p>
                </div>
            </div>

            <!-- Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-4">7. Changes to This Policy</h2>
                <div class="text-gray-400">
                    <p class="leading-relaxed">
                        We may update this Privacy Policy from time to time. We will notify you of any changes by posting 
                        the new policy on this page and updating the "Last updated" date.
                    </p>
                </div>
            </div>

        </div>

        <!-- Contact Box -->
        <div class="mt-16 p-8 bg-white/5 rounded-2xl border border-white/10">
            <h3 class="text-xl font-bold mb-4">Questions about our Privacy Policy?</h3>
            <p class="text-gray-400 mb-6">
                If you have any questions or concerns about how we handle your data, please don't hesitate to reach out.
            </p>
            <a href="{{ route('contact') }}" 
               class="inline-block px-8 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition-all duration-200">
                Contact Us
            </a>
        </div>

    </div>
</div>
@endsection
