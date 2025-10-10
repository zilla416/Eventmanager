@extends('layouts.app')

@section('title', 'Help Center')

@section('content')
<div class="bg-black text-white min-h-screen">
    
    <!-- Hero Section -->
    <div class="relative h-[40vh] overflow-hidden">
        <img class="w-full h-full object-cover brightness-[0.3]"
            src="https://images.unsplash.com/photo-1556761175-b413da4baf72?w=1200"
            alt="Help Center">
        <div class="absolute inset-0 bg-gradient-to-br from-purple-600/20 to-blue-600/20"></div>
        <div class="absolute inset-0 flex items-center justify-center text-center">
            <div class="max-w-4xl px-6">
                <h1 class="text-5xl md:text-7xl font-bold mb-4">Help Center</h1>
                <p class="text-xl text-gray-300">Find answers to common questions</p>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-4xl mx-auto px-6 py-20">
        
        <!-- Search -->
        <div class="mb-12">
            <div class="relative">
                <svg class="absolute left-6 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" 
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" 
                       id="helpSearch"
                       placeholder="Search for help..." 
                       class="w-full bg-white/5 border border-white/10 rounded-full py-4 pl-14 pr-6 
                              focus:outline-none focus:border-white/20 focus:bg-white/10 transition">
            </div>
        </div>

        <!-- FAQ Categories -->
        <div class="space-y-4">
            
            <!-- Booking Tickets -->
            <div class="faq-item bg-white/5 rounded-xl border border-white/10 overflow-hidden">
                <button class="faq-toggle w-full px-6 py-5 flex items-center justify-between hover:bg-white/5 transition">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-left">How do I book tickets?</h3>
                    </div>
                    <svg class="faq-arrow w-5 h-5 text-gray-400 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-content hidden px-6 pb-5 text-gray-400">
                    <p class="leading-relaxed">
                        Browse events on our homepage, select an event you're interested in, choose the number of tickets, 
                        and proceed to checkout. You'll receive a confirmation email with your tickets after payment.
                    </p>
                </div>
            </div>

            <!-- Payment Methods -->
            <div class="faq-item bg-white/5 rounded-xl border border-white/10 overflow-hidden">
                <button class="faq-toggle w-full px-6 py-5 flex items-center justify-between hover:bg-white/5 transition">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-left">What payment methods do you accept?</h3>
                    </div>
                    <svg class="faq-arrow w-5 h-5 text-gray-400 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-content hidden px-6 pb-5 text-gray-400">
                    <p class="leading-relaxed">
                        We accept all major credit cards (Visa, Mastercard, American Express), debit cards, and PayPal. 
                        All transactions are secured with industry-standard encryption.
                    </p>
                </div>
            </div>

            <!-- Refunds -->
            <div class="faq-item bg-white/5 rounded-xl border border-white/10 overflow-hidden">
                <button class="faq-toggle w-full px-6 py-5 flex items-center justify-between hover:bg-white/5 transition">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-yellow-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-left">What is your refund policy?</h3>
                    </div>
                    <svg class="faq-arrow w-5 h-5 text-gray-400 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-content hidden px-6 pb-5 text-gray-400">
                    <p class="leading-relaxed">
                        Refunds are available up to 48 hours before the event starts. Event organizers may have their own 
                        refund policies. For canceled or postponed events, full refunds are automatically processed.
                    </p>
                </div>
            </div>

            <!-- Account Issues -->
            <div class="faq-item bg-white/5 rounded-xl border border-white/10 overflow-hidden">
                <button class="faq-toggle w-full px-6 py-5 flex items-center justify-between hover:bg-white/5 transition">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-purple-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-left">I can't access my account</h3>
                    </div>
                    <svg class="faq-arrow w-5 h-5 text-gray-400 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-content hidden px-6 pb-5 text-gray-400">
                    <p class="leading-relaxed">
                        Try resetting your password using the "Forgot Password" link on the login page. If you're still 
                        having issues, contact our support team at support@eventmanager.com.
                    </p>
                </div>
            </div>

            <!-- Event Not Listed -->
            <div class="faq-item bg-white/5 rounded-xl border border-white/10 overflow-hidden">
                <button class="faq-toggle w-full px-6 py-5 flex items-center justify-between hover:bg-white/5 transition">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-red-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-left">The event I want isn't listed</h3>
                    </div>
                    <svg class="faq-arrow w-5 h-5 text-gray-400 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-content hidden px-6 pb-5 text-gray-400">
                    <p class="leading-relaxed">
                        We're constantly adding new events. If you're an event organizer, you can list your event on our 
                        platform. If you're looking for a specific event, try contacting the organizer to ask if they plan to list it.
                    </p>
                </div>
            </div>

        </div>

        <!-- Still Need Help -->
        <div class="mt-16 text-center p-12 bg-white/5 rounded-2xl border border-white/10">
            <h2 class="text-2xl font-bold mb-4">Still need help?</h2>
            <p class="text-gray-400 mb-8">Our support team is here to assist you</p>
            <a href="{{ route('contact') }}" 
               class="inline-block px-8 py-4 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition-all duration-200">
                Contact Support
            </a>
        </div>

    </div>
</div>

<script>
    // FAQ Toggle functionality
    document.addEventListener('DOMContentLoaded', function() {
        const faqToggles = document.querySelectorAll('.faq-toggle');
        
        faqToggles.forEach(toggle => {
            toggle.addEventListener('click', function() {
                const faqItem = this.closest('.faq-item');
                const content = faqItem.querySelector('.faq-content');
                const arrow = faqItem.querySelector('.faq-arrow');
                
                // Close all other FAQs
                document.querySelectorAll('.faq-item').forEach(item => {
                    if (item !== faqItem) {
                        item.querySelector('.faq-content').classList.add('hidden');
                        item.querySelector('.faq-arrow').style.transform = 'rotate(0deg)';
                    }
                });
                
                // Toggle current FAQ
                content.classList.toggle('hidden');
                if (content.classList.contains('hidden')) {
                    arrow.style.transform = 'rotate(0deg)';
                } else {
                    arrow.style.transform = 'rotate(180deg)';
                }
            });
        });

        // Search functionality
        const searchInput = document.getElementById('helpSearch');
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const faqItems = document.querySelectorAll('.faq-item');
            
            faqItems.forEach(item => {
                const question = item.querySelector('h3').textContent.toLowerCase();
                const answer = item.querySelector('.faq-content').textContent.toLowerCase();
                
                if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection