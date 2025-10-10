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
    <div class="max-w-5xl mx-auto px-6 py-20">
        
        <div class="grid md:grid-cols-2 gap-12">
            
            <!-- Contact Form -->
            <div class="bg-white/5 rounded-2xl p-8 border border-white/10">
                <h2 class="text-2xl font-bold mb-6">Send us a message</h2>
                <form class="space-y-5" id="contactForm">
                    <div>
                        <label class="block text-sm font-medium mb-2">Name</label>
                        <input type="text" id="contactName" required
                               class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 
                                      focus:outline-none focus:border-white/20 transition"
                               placeholder="Your name">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Email</label>
                        <input type="email" id="contactEmail" required
                               class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 
                                      focus:outline-none focus:border-white/20 transition"
                               placeholder="your@email.com">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Subject</label>
                        <input type="text" id="contactSubject" required
                               class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 
                                      focus:outline-none focus:border-white/20 transition"
                               placeholder="How can we help?">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Message</label>
                        <textarea rows="5" id="contactMessage" required
                                  class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 
                                         focus:outline-none focus:border-white/20 transition resize-none"
                                  placeholder="Your message..."></textarea>
                    </div>
                    <button type="submit" id="contactSubmitBtn"
                            class="w-full px-6 py-4 bg-white text-black rounded-full font-semibold 
                                   hover:bg-gray-200 transition-all duration-200">
                        Send Message
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="space-y-8">
                <div>
                    <h2 class="text-2xl font-bold mb-6">Contact Information</h2>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-white/5 rounded-lg flex items-center justify-center flex-shrink-0 border border-white/10">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold mb-1">Email</p>
                                <p class="text-gray-400">support@eventmanager.com</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-white/5 rounded-lg flex items-center justify-center flex-shrink-0 border border-white/10">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold mb-1">Phone</p>
                                <p class="text-gray-400">+31 20 123 4567</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-white/5 rounded-lg flex items-center justify-center flex-shrink-0 border border-white/10">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold mb-1">Office</p>
                                <p class="text-gray-400">Amsterdam, Netherlands</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="p-6 bg-white/5 rounded-xl border border-white/10">
                    <h3 class="font-semibold mb-4">Need quick help?</h3>
                    <div class="space-y-3">
                        <a href="{{ route('help') }}" class="block text-gray-400 hover:text-white transition">
                            → Visit our Help Center
                        </a>
                        <a href="{{ route('homepage') }}" class="block text-gray-400 hover:text-white transition">
                            → Browse Events
                        </a>
                    </div>
                </div>

                <!-- Response Time -->
                <div class="p-6 bg-blue-500/10 rounded-xl border border-blue-500/20">
                    <p class="text-sm text-gray-400">
                        <span class="text-blue-400 font-semibold">⚡ Fast Response:</span> 
                        We typically respond within 24 hours
                    </p>
                </div>
            </div>

        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const contactForm = document.getElementById('contactForm');
        const submitBtn = document.getElementById('contactSubmitBtn');
        
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const name = document.getElementById('contactName').value;
            const email = document.getElementById('contactEmail').value;
            const subject = document.getElementById('contactSubject').value;
            const message = document.getElementById('contactMessage').value;
            
            // Validate
            if (!name || !email || !subject || !message) {
                alert('Please fill in all fields');
                return;
            }
            
            // Show loading state
            submitBtn.textContent = 'Sending...';
            submitBtn.disabled = true;
            
            // Simulate sending (placeholder)
            setTimeout(() => {
                alert('✉️ Message sent successfully! We\'ll get back to you soon.\n\n(This will be connected to the email system later)');
                
                // Reset form
                contactForm.reset();
                submitBtn.textContent = 'Send Message';
                submitBtn.disabled = false;
            }, 1000);
        });
    });
</script>
@endsection
