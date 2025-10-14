@extends('layouts.app')

@section('title', $event->title)

@section('content')
<div class="min-h-screen bg-black text-white">
    <!-- Hero Image -->
    <div class="relative h-[70vh] overflow-hidden">
        <img src="{{ Vite::asset($event->image) }}" 
             alt="{{ $event->title }}" 
             class="w-full h-full object-cover brightness-50">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
        
        <!-- Floating Info -->
        <div class="absolute bottom-0 left-0 right-0 p-8 md:p-16">
            <div class="max-w-6xl mx-auto">
                <div class="inline-block px-3 py-1 bg-white/10 backdrop-blur-md rounded-full text-xs mb-4">
                    {{ strtoupper($event->category) }} • LIVE
                </div>
                <h1 class="text-5xl md:text-7xl font-bold mb-4">{{ $event->title }}</h1>
                <div class="flex items-center gap-6 text-sm">
                    <span>{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</span>
                    <span>•</span>
                    <span>{{ \Carbon\Carbon::parse($event->time)->format('H:i') }}</span>
                    <span>•</span>
                    <span>{{ $event->location }}</span>
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
                        <p>{{ $event->description }}</p>
                    </div>
                </div>

                <!-- Venue -->
                <div>
                    <h2 class="text-2xl font-semibold mb-6">Venue</h2>
                    <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                        <h3 class="font-semibold mb-2">{{ $event->location }}</h3>
                        <p class="text-gray-400 text-sm mb-4">{{ $event->adress }}</p>
                        <div class="flex gap-4 text-sm text-gray-400">
                            <span>{{ number_format($event->max_spots) }} capacity</span>
                            <span>•</span>
                            <span>{{ $event->available_spots }} spots available</span>
                        </div>
                    </div>
                </div>

                <!-- Gallery -->
                <div>
                    <h2 class="text-2xl font-semibold mb-6">Gallery</h2>
                    <div class="grid grid-cols-3 gap-3">
                        @for ($i = 0; $i < 6; $i++)
                        <div class="aspect-square rounded-xl overflow-hidden">
                            <img src="{{ Vite::asset($event->image) }}" 
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
                            <div class="text-4xl font-bold mb-1">€{{ number_format($event->price, 2) }}</div>
                            <div class="text-sm text-gray-500">per person</div>
                        </div>

                        <!-- Quantity -->
                        <div class="mb-6">
                            <label class="text-sm font-medium mb-3 block">Tickets</label>
                            <div class="flex items-center justify-between bg-gray-100 rounded-xl p-2">
                                <button id="decreaseBtn" class="w-10 h-10 flex items-center justify-center hover:bg-gray-200 rounded-lg transition">−</button>
                                <span id="quantityDisplay" class="font-medium">1</span>
                                <button id="increaseBtn" class="w-10 h-10 flex items-center justify-center hover:bg-gray-200 rounded-lg transition">+</button>
                            </div>
                        </div>

                        <!-- CTA -->
                        <button id="addToCartBtn" class="block w-full bg-black text-white py-4 rounded-xl font-medium hover:bg-gray-900 transition mb-4 text-center">
                            Add to Cart
                        </button>

                        <div class="text-center text-xs text-gray-500">
                            <span id="spotsAvailable">{{ number_format($event->available_spots) }}</span> spots available
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let quantity = 1;
        const maxQuantity = 10;
        const minQuantity = 1;
        const pricePerTicket = {{ $event->price }};
        const eventData = {
            event_id: {{ $event->event_id }},
            title: "{{ $event->title }}",
            location: "{{ $event->location }}",
            date: "{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}",
            time: "{{ \Carbon\Carbon::parse($event->time)->format('H:i') }}",
            image: "{{ $event->image }}",
            category: "{{ $event->category ?? 'music' }}",
            price: pricePerTicket
        };
        
        const decreaseBtn = document.getElementById('decreaseBtn');
        const increaseBtn = document.getElementById('increaseBtn');
        const quantityDisplay = document.getElementById('quantityDisplay');
        const addToCartBtn = document.getElementById('addToCartBtn');
        
        function updateQuantity() {
            quantityDisplay.textContent = quantity;
            
            // Update button states
            decreaseBtn.style.opacity = quantity <= minQuantity ? '0.5' : '1';
            decreaseBtn.style.cursor = quantity <= minQuantity ? 'not-allowed' : 'pointer';
            increaseBtn.style.opacity = quantity >= maxQuantity ? '0.5' : '1';
            increaseBtn.style.cursor = quantity >= maxQuantity ? 'not-allowed' : 'pointer';
        }
        
        decreaseBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (quantity > minQuantity) {
                quantity--;
                updateQuantity();
            }
        });
        
        increaseBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (quantity < maxQuantity) {
                quantity++;
                updateQuantity();
            }
        });
        
        // Add to Cart functionality
        addToCartBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Get existing cart
            let cart = JSON.parse(localStorage.getItem('cart') || '[]');
            
            // Check if event already in cart
            const existingItem = cart.find(item => item.event_id === eventData.event_id);
            
            if (existingItem) {
                // Update quantity (max 10 total)
                const newQuantity = Math.min(existingItem.quantity + quantity, maxQuantity);
                existingItem.quantity = newQuantity;
                
                if (newQuantity >= maxQuantity) {
                    alert(`Maximum ${maxQuantity} tickets per event. Cart updated to maximum.`);
                } else {
                    // Show success message
                    const originalText = addToCartBtn.textContent;
                    addToCartBtn.textContent = '✓ Added to Cart';
                    addToCartBtn.classList.add('bg-green-600');
                    addToCartBtn.classList.remove('bg-black');
                    
                    setTimeout(() => {
                        addToCartBtn.textContent = originalText;
                        addToCartBtn.classList.remove('bg-green-600');
                        addToCartBtn.classList.add('bg-black');
                    }, 2000);
                }
            } else {
                // Add new item to cart
                cart.push({
                    ...eventData,
                    quantity: quantity
                });
                
                // Show success message
                const originalText = addToCartBtn.textContent;
                addToCartBtn.textContent = '✓ Added to Cart';
                addToCartBtn.classList.add('bg-green-600');
                addToCartBtn.classList.remove('bg-black');
                
                setTimeout(() => {
                    addToCartBtn.textContent = originalText;
                    addToCartBtn.classList.remove('bg-green-600');
                    addToCartBtn.classList.add('bg-black');
                }, 2000);
            }
            
            // Save cart
            localStorage.setItem('cart', JSON.stringify(cart));
            
            // Trigger cart update event for header badge
            window.dispatchEvent(new Event('cartUpdated'));
            
            // Reset quantity to 1
            quantity = 1;
            updateQuantity();
        });
        
        // Initialize
        updateQuantity();
    });
</script>
@endsection