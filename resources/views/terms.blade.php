@extends('layouts.app')

@section('title', 'Terms of Service')

@section('content')
<div class="bg-black text-white min-h-screen">
    
    <!-- Hero Section -->
    <div class="relative h-[40vh] overflow-hidden">
        <img class="w-full h-full object-cover brightness-[0.35]"
            src="https://images.unsplash.com/photo-1436450412740-6b988f486c6b?w=1200"
            alt="Terms of Service">
        <div class="absolute inset-0 bg-gradient-to-br from-gray-800 to-black"></div>
        <div class="absolute inset-0 flex items-center justify-center text-center">
            <div class="max-w-4xl px-6">
                <h1 class="text-5xl md:text-7xl font-bold mb-4">Terms of Service</h1>
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
                    Welcome to EventManager. By accessing or using our platform, you agree to be bound by these Terms of Service. 
                    Please read them carefully before using our services.
                </p>
            </div>

            <!-- Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-4">1. Acceptance of Terms</h2>
                <div class="text-gray-400">
                    <p class="leading-relaxed">
                        By creating an account or using EventManager, you acknowledge that you have read, understood, and agree 
                        to be bound by these Terms of Service and our Privacy Policy. If you do not agree, please do not use our platform.
                    </p>
                </div>
            </div>

            <!-- Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-4">2. User Accounts</h2>
                <div class="space-y-4 text-gray-400">
                    <p class="leading-relaxed">To use certain features, you must create an account. You agree to:</p>
                    <ul class="list-disc list-inside space-y-2 ml-4">
                        <li>Provide accurate and complete information</li>
                        <li>Maintain the security of your account credentials</li>
                        <li>Notify us immediately of any unauthorized access</li>
                        <li>Be responsible for all activities under your account</li>
                        <li>Not share your account with others</li>
                    </ul>
                </div>
            </div>

            <!-- Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-4">3. Ticket Purchases</h2>
                <div class="space-y-4 text-gray-400">
                    <p class="leading-relaxed">When purchasing tickets through EventManager:</p>
                    <ul class="list-disc list-inside space-y-2 ml-4">
                        <li>All ticket sales are final unless otherwise stated by the event organizer</li>
                        <li>Ticket prices include service fees and applicable taxes</li>
                        <li>You may not resell tickets for profit without authorization</li>
                        <li>Event dates, times, and venues are subject to change by organizers</li>
                        <li>Refunds are handled according to the event's specific refund policy</li>
                    </ul>
                </div>
            </div>

            <!-- Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-4">4. User Conduct</h2>
                <div class="space-y-4 text-gray-400">
                    <p class="leading-relaxed">You agree not to:</p>
                    <ul class="list-disc list-inside space-y-2 ml-4">
                        <li>Use the platform for any illegal or unauthorized purpose</li>
                        <li>Attempt to gain unauthorized access to our systems</li>
                        <li>Interfere with or disrupt the platform's functionality</li>
                        <li>Post false, misleading, or defamatory content</li>
                        <li>Harass, abuse, or harm other users or organizers</li>
                        <li>Use automated tools to scrape or collect data</li>
                    </ul>
                </div>
            </div>

            <!-- Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-4">5. Event Organizer Responsibilities</h2>
                <div class="text-gray-400">
                    <p class="leading-relaxed">
                        Event organizers are responsible for the accuracy of event information, fulfillment of ticket sales, 
                        and compliance with all applicable laws. EventManager acts as a platform provider and is not responsible 
                        for the quality or execution of events.
                    </p>
                </div>
            </div>

            <!-- Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-4">6. Intellectual Property</h2>
                <div class="text-gray-400">
                    <p class="leading-relaxed">
                        All content on EventManager, including text, graphics, logos, and software, is owned by EventManager 
                        or its licensors and is protected by copyright and intellectual property laws. You may not reproduce, 
                        distribute, or create derivative works without permission.
                    </p>
                </div>
            </div>

            <!-- Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-4">7. Limitation of Liability</h2>
                <div class="text-gray-400">
                    <p class="leading-relaxed">
                        EventManager is provided "as is" without warranties of any kind. We are not liable for any damages 
                        arising from your use of the platform, including but not limited to event cancellations, postponements, 
                        or quality issues. Our liability is limited to the amount paid for your ticket purchase.
                    </p>
                </div>
            </div>

            <!-- Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-4">8. Modifications to Terms</h2>
                <div class="text-gray-400">
                    <p class="leading-relaxed">
                        We reserve the right to modify these Terms of Service at any time. We will notify users of significant 
                        changes via email or platform notification. Continued use of EventManager after changes constitutes 
                        acceptance of the new terms.
                    </p>
                </div>
            </div>

            <!-- Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-4">9. Termination</h2>
                <div class="text-gray-400">
                    <p class="leading-relaxed">
                        We may suspend or terminate your account at any time for violation of these terms, suspicious activity, 
                        or at our discretion. You may close your account at any time by contacting support.
                    </p>
                </div>
            </div>

            <!-- Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-4">10. Governing Law</h2>
                <div class="text-gray-400">
                    <p class="leading-relaxed">
                        These Terms of Service are governed by the laws of the Netherlands. Any disputes will be resolved 
                        in the courts of Amsterdam, Netherlands.
                    </p>
                </div>
            </div>

        </div>

        <!-- Contact Box -->
        <div class="mt-16 p-8 bg-white/5 rounded-2xl border border-white/10">
            <h3 class="text-xl font-bold mb-4">Questions about our Terms?</h3>
            <p class="text-gray-400 mb-6">
                If you have any questions about these Terms of Service, please contact our support team.
            </p>
            <a href="{{ route('contact') }}" 
               class="inline-block px-8 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition-all duration-200">
                Contact Us
            </a>
        </div>

    </div>
</div>
@endsection
