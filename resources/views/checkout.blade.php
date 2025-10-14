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

                    <!-- Card Details (shown when card is selected) -->
                    <div id="cardDetails" class="mt-6 space-y-4">
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
            const cart = getCart();
            const container = document.getElementById('cartItemsContainer');
            const emptyMessage = document.getElementById('emptyCartMessage');
            
            if (cart.length === 0) {
                container.innerHTML = '';
                emptyMessage.classList.remove('hidden');
                updateSummary(cart);
                return;
            }
            
            emptyMessage.classList.add('hidden');
            
            container.innerHTML = cart.map(item => `
                <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                    <!-- Event Info -->
                    <div class="flex gap-3 mb-3">
                        <div class="w-20 h-20 rounded-lg overflow-hidden bg-white/10 flex-shrink-0">
                            <img src="${item.image || '/resources/img/concert1.png'}" 
                                 alt="${item.title}"
                                 class="w-full h-full object-cover">
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
            `).join('');
            
            updateSummary(cart);
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
        
        paymentRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'card') {
                    cardDetails.style.display = 'block';
                } else {
                    cardDetails.style.display = 'none';
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
            
            // Check payment fields (only if card is selected)
            const selectedPayment = document.querySelector('input[name="payment"]:checked')?.value;
            let paymentValid = true;
            
            if (selectedPayment === 'card') {
                paymentValid = cardFields.every(fieldId => {
                    const field = document.getElementById(fieldId);
                    return field && field.value.trim() !== '';
                });
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
        
        termsCheckbox.addEventListener('change', validateForm);
        
        paymentRadios.forEach(radio => {
            radio.addEventListener('change', validateForm);
        });
    });
</script>
@endsection
