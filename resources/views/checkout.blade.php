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

            <!-- Right Column - Order Summary -->
            <div class="lg:col-span-1">
                <div class="sticky top-8 bg-white/5 rounded-2xl p-6 border border-white/10">
                    <h2 class="text-xl font-semibold mb-6">Order Summary</h2>
                    
                    <!-- Event Details -->
                    <div class="mb-6 pb-6 border-b border-white/10">
                        <div class="aspect-video rounded-xl overflow-hidden mb-4">
                            <img src="{{ Vite::asset('resources/img/concert1.png') }}" 
                                 alt="Event" 
                                 class="w-full h-full object-cover">
                        </div>
                        <h3 class="font-semibold mb-2">Concert at Ziggodome</h3>
                        <div class="text-sm text-gray-400 space-y-1">
                            <p>Dec 1, 2025 • 19:00</p>
                            <p>Ziggodome, Amsterdam</p>
                        </div>
                    </div>

                    <!-- Price Breakdown -->
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-400">Tickets (<span id="summaryQuantity">2</span>x)</span>
                            <span id="summarySubtotal">€179.00</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-400">Service fee</span>
                            <span id="summaryFee">€8.95</span>
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
                            <span class="text-2xl font-bold" id="summaryTotal">€190.45</span>
                        </div>
                        <p class="text-xs text-gray-400">All taxes included</p>
                    </div>

                    <!-- Complete Purchase Button -->
                    <button id="completePurchaseBtn" disabled
                            class="w-full bg-white text-black py-4 rounded-xl font-semibold hover:bg-gray-200 transition disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-white">
                        Complete Purchase
                    </button>

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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        const quantity = parseInt(urlParams.get('quantity')) || 2;
        const pricePerTicket = parseFloat(urlParams.get('price')) || 89.50;
        
        // Calculate totals
        const subtotal = quantity * pricePerTicket;
        const serviceFee = quantity * 4.475; // €4.475 per ticket
        const processingFee = 2.50;
        const total = subtotal + serviceFee + processingFee;
        
        // Update summary
        document.getElementById('summaryQuantity').textContent = quantity;
        document.getElementById('summarySubtotal').textContent = `€${subtotal.toFixed(2)}`;
        document.getElementById('summaryFee').textContent = `€${serviceFee.toFixed(2)}`;
        document.getElementById('summaryProcessing').textContent = `€${processingFee.toFixed(2)}`;
        document.getElementById('summaryTotal').textContent = `€${total.toFixed(2)}`;
        
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
            // Check required contact fields
            const contactValid = requiredFields.every(fieldId => {
                const field = document.getElementById(fieldId);
                return field && field.value.trim() !== '';
            });
            
            // Check payment fields (only if card is selected)
            const selectedPayment = document.querySelector('input[name="payment"]:checked').value;
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
        
        // Complete purchase
        completePurchaseBtn.addEventListener('click', function() {
            if (!this.disabled) {
                // Show success message (placeholder)
                alert('🎉 Purchase complete! You will receive a confirmation email shortly.\n\n(This will be connected to the payment gateway and database later)');
                
                // Redirect to account page (or confirmation page)
                setTimeout(() => {
                    window.location.href = '{{ route("account") }}';
                }, 1000);
            }
        });
    });
</script>
@endsection
