@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="min-h-screen bg-black text-white py-12">
    <div class="max-w-6xl mx-auto px-6 md:px-8">
        
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl md:text-5xl font-bold mb-2">Checkout</h1>
            <p class="text-gray-400">Complete your booking</p>
        </div>

        <!-- Main Grid -->
        <div class="grid lg:grid-cols-3 gap-8">
            
            <!-- Left Column - Forms -->
            <div class="lg:col-span-2 space-y-6">
                
                <!-- Contact Information -->
                <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                    <h2 class="text-xl font-semibold mb-6">Contact Information</h2>
                    <div class="space-y-4">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm text-gray-400 mb-2">First Name</label>
                                <input type="text" id="firstName" placeholder="John" 
                                       class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">
                            </div>
                            <div>
                                <label class="block text-sm text-gray-400 mb-2">Last Name</label>
                                <input type="text" id="lastName" placeholder="Doe" 
                                       class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Email</label>
                            <input type="email" id="email" placeholder="john@example.com" 
                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Phone Number</label>
                            <input type="tel" id="phone" placeholder="+31 6 12345678" 
                                   class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                    <h2 class="text-xl font-semibold mb-6">Payment Method</h2>
                    <div class="space-y-3">
                        <label class="flex items-center gap-4 p-4 bg-white/5 rounded-xl border border-white/10 cursor-pointer hover:border-white/20 transition">
                            <input type="radio" name="payment" value="card" checked class="w-4 h-4">
                            <span class="flex-1 font-medium">Credit / Debit Card</span>
                            <div class="flex gap-2">
                                <div class="w-10 h-6 bg-white/10 rounded flex items-center justify-center text-[8px] font-bold">VISA</div>
                                <div class="w-10 h-6 bg-white/10 rounded flex items-center justify-center text-[8px] font-bold">MC</div>
                            </div>
                        </label>
                        <label class="flex items-center gap-4 p-4 bg-white/5 rounded-xl border border-white/10 cursor-pointer hover:border-white/20 transition">
                            <input type="radio" name="payment" value="ideal" class="w-4 h-4">
                            <span class="flex-1 font-medium">iDEAL</span>
                            <div class="text-xs text-gray-400">Popular in NL</div>
                        </label>
                        <label class="flex items-center gap-4 p-4 bg-white/5 rounded-xl border border-white/10 cursor-pointer hover:border-white/20 transition">
                            <input type="radio" name="payment" value="paypal" class="w-4 h-4">
                            <span class="flex-1 font-medium">PayPal</span>
                        </label>
                    </div>

                    <!-- Payment Details Container -->
                    <div class="mt-6">
                        <!-- Card Details (shown when card is selected) -->
                        <div id="cardDetails" class="space-y-4">
                            <div>
                                <label class="block text-sm text-gray-400 mb-2">Card Number</label>
                                <input type="text" id="cardNumber" placeholder="1234 5678 9012 3456" maxlength="19"
                                       class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm text-gray-400 mb-2">Expiry Date</label>
                                    <input type="text" id="expiry" placeholder="MM / YY" maxlength="7"
                                           class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-400 mb-2">CVV</label>
                                    <input type="text" id="cvv" placeholder="123" maxlength="3"
                                           class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">
                                </div>
                            </div>
                        </div>

                        <!-- iDEAL Details (shown when iDEAL is selected) -->
                        <div id="idealDetails" class="space-y-4" style="display: none;">
                            <div>
                            <label class="block text-sm text-gray-400 mb-2">Select Your Bank</label>
                            <select id="idealBank" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 transition">
                                <option value="">Choose your bank...</option>
                                <option value="abn_amro">ABN AMRO</option>
                                <option value="asn">ASN Bank</option>
                                <option value="bunq">Bunq</option>
                                <option value="ing">ING</option>
                                <option value="knab">Knab</option>
                                <option value="rabobank">Rabobank</option>
                                <option value="regiobank">RegioBank</option>
                                <option value="revolut">Revolut</option>
                                <option value="sns">SNS Bank</option>
                                <option value="triodos">Triodos Bank</option>
                            </select>
                        </div>
                        <div class="bg-blue-500/10 border border-blue-500/20 rounded-xl p-4 text-sm text-blue-300">
                            <div class="flex items-start gap-2">
                                <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <p>You will be redirected to your bank to complete the payment securely.</p>
                            </div>
                        </div>
                    </div>

                    <!-- PayPal Details (shown when PayPal is selected) -->
                    <div id="paypalDetails" class="space-y-4" style="display: none;">
                        <div class="bg-blue-500/10 border border-blue-500/20 rounded-xl p-4 text-center">
                            <svg class="w-16 h-16 mx-auto mb-3 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7.076 21.337H2.47a.641.641 0 0 1-.633-.74L4.944 3.72a.77.77 0 0 1 .759-.63h8.975c.468 0 .92.084 1.337.247 1.235.485 2.028 1.528 2.28 3.008.244 1.43.027 2.666-.648 3.671-.7 1.04-1.805 1.787-3.282 2.218-.373.108-.768.162-1.172.162h-2.316a.768.768 0 0 0-.759.63l-1.158 6.311zm13.073-14.384c.014.117.02.235.02.354 0 .794-.145 1.56-.428 2.28-.283.72-.696 1.363-1.228 1.91a5.839 5.839 0 0 1-1.91 1.299c-.745.31-1.571.465-2.454.465h-.467a.768.768 0 0 0-.759.63l-.854 4.657a.641.641 0 0 1-.633.546H8.786a.384.384 0 0 1-.38-.444l.79-4.306a1.152 1.152 0 0 1 1.138-.948h1.652c3.156 0 5.407-1.283 6.333-3.616.393-.99.577-2.04.55-3.126z"/>
                            </svg>
                            <p class="text-sm text-gray-300 mb-4">Click "Complete Purchase" to proceed to PayPal</p>
                            <p class="text-xs text-gray-400">You will be redirected to PayPal to complete your payment securely.</p>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Terms -->
                <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                    <label class="flex items-start gap-3 cursor-pointer">
                        <input type="checkbox" id="termsCheckbox" class="mt-1 w-4 h-4">
                        <span class="text-sm text-gray-400">
                            I agree to the <a href="{{ route('terms') }}" class="text-white underline hover:text-gray-300">Terms of Service</a> and <a href="{{ route('privacy') }}" class="text-white underline hover:text-gray-300">Privacy Policy</a>
                        </span>
                    </label>
                </div>

            </div>

            <!-- Right Column - Shopping Cart & Order Summary -->
            <div class="lg:col-span-1">
                <div class="sticky top-8 space-y-6">
                    
                    <!-- Shopping Cart -->
                    <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-semibold">Shopping Cart</h2>
                            <button id="clearCartBtn" class="text-sm text-red-400 hover:text-red-300 transition">
                                Clear All
                            </button>
                        </div>
                        
                        <!-- Cart Items Container -->
                        <div id="cartItemsContainer" class="space-y-4 mb-6">
                            <!-- Cart items will be dynamically loaded here -->
                        </div>
                        
                        <!-- Empty Cart Message -->
                        <div id="emptyCartMessage" class="hidden text-center py-8">
                            <svg class="w-16 h-16 mx-auto mb-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            <p class="text-gray-400 mb-4">Your cart is empty</p>
                            <a href="{{ route('homepage') }}" class="inline-block px-6 py-2 bg-white/10 hover:bg-white/20 rounded-full text-sm transition">
                                Browse Events
                            </a>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                        <h2 class="text-xl font-semibold mb-6">Order Summary</h2>

                        <!-- Price Breakdown -->
                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-400">Subtotal (<span id="summaryQuantity">0</span> tickets)</span>
                                <span id="summarySubtotal">€0.00</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-400">Service fee</span>
                                <span id="summaryFee">€0.00</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-400">Processing fee</span>
                                <span id="summaryProcessing">€2.50</span>
                            </div>
                        </div>

                        <!-- Total -->
                        <div class="pt-6 border-t border-white/10 mb-6">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-lg font-semibold">Total</span>
                                <span class="text-2xl font-bold" id="summaryTotal">€0.00</span>
                            </div>
                            <p class="text-xs text-gray-400">All taxes included</p>
                        </div>

                        <!-- Complete Purchase Button -->
                        <form id="purchaseForm" method="POST" action="{{ route('purchase') }}">
                            @csrf
                            <input type="hidden" name="cart_data" id="formCartData" value="">
                            <input type="hidden" name="total" id="formTotal" value="0">
                            <button id="completePurchaseBtn" disabled
                                    class="w-full bg-white text-black py-4 rounded-xl font-semibold hover:bg-gray-200 transition disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-white">
                                Complete Purchase
                            </button>
                        </form>

                        <!-- Security Badge -->
                        <div class="mt-6 flex items-center justify-center gap-2 text-xs text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            <span>Secure checkout</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        try {
        const MAX_TICKETS = 10;
        
        // Get cart from localStorage
        function getCart() {
            return JSON.parse(localStorage.getItem('cart') || '[]');
        }
        
        // Save cart to localStorage
        function saveCart(cart) {
            localStorage.setItem('cart', JSON.stringify(cart));
            // Trigger cart update event for header badge
            window.dispatchEvent(new Event('cartUpdated'));
        }
        
        // Update cart item quantity
        function updateQuantity(eventId, newQuantity) {
            let cart = getCart();
            const item = cart.find(i => i.event_id == eventId);
            
            if (item) {
                if (newQuantity > 0 && newQuantity <= MAX_TICKETS) {
                    item.quantity = newQuantity;
                } else if (newQuantity <= 0) {
                    // Remove item if quantity is 0
                    cart = cart.filter(i => i.event_id != eventId);
                }
            }
            
            saveCart(cart);
            renderCart();
        }
        
        // Remove item from cart
        function removeItem(eventId) {
            let cart = getCart();
            cart = cart.filter(i => i.event_id != eventId);
            saveCart(cart);
            renderCart();
        }
        
        // Clear entire cart
        function clearCart() {
            if (confirm('Are you sure you want to clear your cart?')) {
                localStorage.removeItem('cart');
                window.dispatchEvent(new Event('cartUpdated'));
                renderCart();
            }
        }
        
        // Render cart items
        function renderCart() {
            try {
                const cart = getCart();
                const container = document.getElementById('cartItemsContainer');
                const emptyMessage = document.getElementById('emptyCartMessage');
                
                if (!container || !emptyMessage) {
                    console.error('Cart container elements not found');
                    return;
                }
                
                if (cart.length === 0) {
                    container.innerHTML = '';
                    emptyMessage.classList.remove('hidden');
                    updateSummary(cart);
                    return;
                }
                
                emptyMessage.classList.add('hidden');
            
            container.innerHTML = cart.map(item => {
                // Get category icon and color
                const categoryIcons = {
                    'music': { icon: 'M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3', color: 'from-purple-500 to-pink-500' },
                    'sports': { icon: 'M3 3l1.664 1.664M21 21l-1.5-1.5m-2.829-2.829L15.5 15.5M4.929 4.929L7.757 7.757M9.879 16.121A3 3 0 1012.015 11L11 17H7v4M2.5 2.5l19 19', color: 'from-green-500 to-teal-500' },
                    'theater': { icon: 'M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z', color: 'from-red-500 to-orange-500' },
                    'comedy': { icon: 'M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z', color: 'from-yellow-500 to-amber-500' },
                    'family': { icon: 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z', color: 'from-blue-500 to-cyan-500' }
                };
                
                const category = (item.category || 'music').toLowerCase();
                const iconData = categoryIcons[category] || categoryIcons['music'];
                
                return `
                <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                    <!-- Event Info -->
                    <div class="flex gap-3 mb-3">
                        <div class="w-20 h-20 rounded-lg bg-gradient-to-br ${iconData.color} flex items-center justify-center flex-shrink-0">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${iconData.icon}"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="font-semibold text-sm mb-1 truncate">${item.title}</h4>
                            <p class="text-xs text-gray-400 truncate">${item.location || 'Location'}</p>
                            <p class="text-xs text-gray-500">${item.date || ''}</p>
                        </div>
                    </div>
                    
                    <!-- Price -->
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm text-gray-400">Price per ticket</span>
                        <span class="font-semibold">€${parseFloat(item.price).toFixed(2)}</span>
                    </div>
                    
                    <!-- Quantity Controls -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <button onclick="updateQuantity(${item.event_id}, ${item.quantity - 1})" 
                                    class="w-8 h-8 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition ${item.quantity <= 1 ? 'opacity-50 cursor-not-allowed' : ''}">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                </svg>
                            </button>
                            <span class="w-8 text-center font-semibold">${item.quantity}</span>
                            <button onclick="updateQuantity(${item.event_id}, ${item.quantity + 1})" 
                                    class="w-8 h-8 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition ${item.quantity >= MAX_TICKETS ? 'opacity-50 cursor-not-allowed' : ''}">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                            </button>
                        </div>
                        
                        <div class="flex items-center gap-3">
                            <span class="font-bold">€${(item.quantity * parseFloat(item.price)).toFixed(2)}</span>
                            <button onclick="removeItem(${item.event_id})" 
                                    class="text-red-400 hover:text-red-300 transition"
                                    title="Remove from cart">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    ${item.quantity >= MAX_TICKETS ? `
                        <div class="mt-2 text-xs text-yellow-400 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            Maximum ${MAX_TICKETS} tickets per event
                        </div>
                    ` : ''}
                </div>
                `;
            }).join('');
            
            updateSummary(cart);
            } catch (error) {
                console.error('Error rendering cart:', error);
            }
        }
        
        // Update order summary
        function updateSummary(cart) {
            const totalTickets = cart.reduce((sum, item) => sum + item.quantity, 0);
            const subtotal = cart.reduce((sum, item) => sum + (item.quantity * parseFloat(item.price)), 0);
            const serviceFee = cart.reduce((sum, item) => sum + (item.quantity * 4.475), 0); // €4.475 per ticket
            const processingFee = cart.length > 0 ? 2.50 : 0;
            const total = subtotal + serviceFee + processingFee;
            
            document.getElementById('summaryQuantity').textContent = totalTickets;
            document.getElementById('summarySubtotal').textContent = `€${subtotal.toFixed(2)}`;
            document.getElementById('summaryFee').textContent = `€${serviceFee.toFixed(2)}`;
            document.getElementById('summaryProcessing').textContent = `€${processingFee.toFixed(2)}`;
            document.getElementById('summaryTotal').textContent = `€${total.toFixed(2)}`;
            
            // Update form hidden fields
            document.getElementById('formCartData').value = JSON.stringify(cart);
            document.getElementById('formTotal').value = total.toFixed(2);
            
            // Validate form
            validateForm();
        }
        
        // Make functions global so onclick can access them
        window.updateQuantity = updateQuantity;
        window.removeItem = removeItem;
        
        // Clear cart button
        document.getElementById('clearCartBtn').addEventListener('click', clearCart);
        
        // Initial render
        renderCart();
        
        // Payment method toggle
        const paymentRadios = document.querySelectorAll('input[name="payment"]');
        const cardDetails = document.getElementById('cardDetails');
        const idealDetails = document.getElementById('idealDetails');
        const paypalDetails = document.getElementById('paypalDetails');
        
        paymentRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                // Hide all payment details
                cardDetails.style.display = 'none';
                idealDetails.style.display = 'none';
                paypalDetails.style.display = 'none';
                
                // Show selected payment method details
                if (this.value === 'card') {
                    cardDetails.style.display = 'block';
                } else if (this.value === 'ideal') {
                    idealDetails.style.display = 'block';
                } else if (this.value === 'paypal') {
                    paypalDetails.style.display = 'block';
                }
                validateForm();
            });
        });
        
        // Card number formatting
        const cardNumberInput = document.getElementById('cardNumber');
        cardNumberInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s/g, '');
            let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
            e.target.value = formattedValue;
        });
        
        // Expiry date formatting
        const expiryInput = document.getElementById('expiry');
        expiryInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.slice(0, 2) + ' / ' + value.slice(2, 4);
            }
            e.target.value = value;
        });
        
        // Form validation
        const requiredFields = ['firstName', 'lastName', 'email', 'phone'];
        const cardFields = ['cardNumber', 'expiry', 'cvv'];
        const termsCheckbox = document.getElementById('termsCheckbox');
        const completePurchaseBtn = document.getElementById('completePurchaseBtn');
        
        function validateForm() {
            const cart = getCart();
            
            // Check if cart has items
            if (cart.length === 0) {
                completePurchaseBtn.disabled = true;
                return;
            }
            
            // Check required contact fields
            const contactValid = requiredFields.every(fieldId => {
                const field = document.getElementById(fieldId);
                return field && field.value.trim() !== '';
            });
            
            // Check payment fields based on selected payment method
            const selectedPayment = document.querySelector('input[name="payment"]:checked')?.value;
            let paymentValid = true;
            
            if (selectedPayment === 'card') {
                paymentValid = cardFields.every(fieldId => {
                    const field = document.getElementById(fieldId);
                    return field && field.value.trim() !== '';
                });
            } else if (selectedPayment === 'ideal') {
                const idealBank = document.getElementById('idealBank');
                paymentValid = idealBank && idealBank.value.trim() !== '';
            } else if (selectedPayment === 'paypal') {
                // PayPal doesn't need additional fields
                paymentValid = true;
            }
            
            // Check terms
            const termsValid = termsCheckbox.checked;
            
            // Enable/disable button
            completePurchaseBtn.disabled = !(contactValid && paymentValid && termsValid);
        }
        
        // Add validation listeners
        requiredFields.forEach(fieldId => {
            const field = document.getElementById(fieldId);
            if (field) {
                field.addEventListener('input', validateForm);
            }
        });
        
        cardFields.forEach(fieldId => {
            const field = document.getElementById(fieldId);
            if (field) {
                field.addEventListener('input', validateForm);
            }
        });
        
        // Add validation listener for iDEAL bank selection
        const idealBank = document.getElementById('idealBank');
        if (idealBank) {
            idealBank.addEventListener('change', validateForm);
        }
        
        termsCheckbox.addEventListener('change', validateForm);
        
        paymentRadios.forEach(radio => {
            radio.addEventListener('change', validateForm);
        });
        
        // Handle form submission
        const purchaseForm = document.getElementById('purchaseForm');
        purchaseForm.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent default to show fake payment processing
            
            const cart = getCart();
            const selectedPayment = document.querySelector('input[name="payment"]:checked')?.value;
            
            // Show payment processing modal
            showPaymentProcessing(selectedPayment);
            
            // Simulate payment processing (2 seconds)
            setTimeout(() => {
                // Populate hidden fields with cart data
                document.getElementById('formCartData').value = JSON.stringify(cart);
                
                // Calculate and set total
                const subtotal = cart.reduce((sum, item) => sum + (item.quantity * parseFloat(item.price)), 0);
                const serviceFee = cart.reduce((sum, item) => sum + (item.quantity * 4.475), 0);
                const processingFee = 2.50;
                const total = subtotal + serviceFee + processingFee;
                
                document.getElementById('formTotal').value = total.toFixed(2);
                
                // Show success and actually submit
                showPaymentSuccess(selectedPayment);
                
                // Clear cart after successful payment
                localStorage.removeItem('cart');
                window.dispatchEvent(new Event('cartUpdated'));
                
                // Submit form after showing success (3 seconds)
                setTimeout(() => {
                    purchaseForm.submit();
                }, 3000);
            }, 2000);
        });
        
        // Show payment processing modal
        function showPaymentProcessing(paymentMethod) {
            const methodNames = {
                'card': 'Card',
                'ideal': 'iDEAL',
                'paypal': 'PayPal'
            };
            
            const modal = document.createElement('div');
            modal.id = 'paymentModal';
            modal.className = 'fixed inset-0 bg-black/80 backdrop-blur-sm flex items-center justify-center z-50';
            modal.innerHTML = `
                <div class="bg-white/10 backdrop-blur-xl rounded-2xl p-8 border border-white/20 text-center max-w-md">
                    <div class="w-16 h-16 border-4 border-white/20 border-t-white rounded-full animate-spin mx-auto mb-4"></div>
                    <h3 class="text-xl font-bold mb-2">Processing Payment</h3>
                    <p class="text-gray-400">Please wait while we process your ${methodNames[paymentMethod]} payment...</p>
                </div>
            `;
            document.body.appendChild(modal);
        }
        
        // Show payment success
        function showPaymentSuccess(paymentMethod) {
            const modal = document.getElementById('paymentModal');
            if (modal) {
                modal.innerHTML = `
                    <div class="bg-white/10 backdrop-blur-xl rounded-2xl p-8 border border-white/20 text-center max-w-md">
                        <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-2 text-green-400">Payment Successful!</h3>
                        <p class="text-gray-400">Your tickets have been confirmed. Redirecting to your account...</p>
                    </div>
                `;
            }
        }
        } catch (error) {
            console.error('Checkout page error:', error);
            // Prevent infinite loop by showing error
            document.body.innerHTML = '<div style="color: white; padding: 20px;">Error loading checkout. Please refresh the page. Error: ' + error.message + '</div>';
        }
    });
</script>
@endsection
