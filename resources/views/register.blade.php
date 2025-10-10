@extends('layouts.app')

@section('title', 'Create Account')

@section('content')
<div class="min-h-screen bg-black text-white flex">
    
    <!-- Left Side - Hero Image -->
    <div class="hidden lg:block lg:w-1/2 relative overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=1200" 
                 alt="Live event"
                 class="w-full h-full object-cover brightness-[0.35]">
            <div class="absolute inset-0 bg-gradient-to-br from-purple-600/20 to-blue-600/20"></div>
        </div>
        <div class="absolute inset-0 flex items-center justify-center p-12">
            <div class="max-w-lg text-center">
                <h2 class="text-5xl font-bold mb-6">Join EventManager</h2>
                <p class="text-xl text-gray-300 leading-relaxed">
                    Create an account to discover, book, and manage tickets for thousands of amazing events
                </p>
            </div>
        </div>
    </div>

    <!-- Right Side - Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-6 lg:p-12">
        <div class="w-full max-w-md">
            
            <!-- Logo -->
            <a href="{{ route('homepage') }}" class="inline-block mb-8 text-2xl font-bold hover:text-gray-300 transition">
                EventManager
            </a>

            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold mb-3">Create your account</h1>
                <p class="text-gray-400">Start your journey with us today</p>
            </div>

            <!-- Registration Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium mb-2">Full Name</label>
                    <input type="text" 
                           name="name" 
                           id="name" 
                           value="{{ old('name') }}" 
                           required 
                           autofocus
                           class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3.5 
                                  focus:outline-none focus:border-white/20 focus:bg-white/10 transition
                                  placeholder-gray-500 @error('name') border-red-500/50 @enderror"
                           placeholder="John Doe">
                    @error('name')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium mb-2">Email</label>
                    <input type="email" 
                           name="email" 
                           id="email" 
                           value="{{ old('email') }}" 
                           required
                           class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3.5 
                                  focus:outline-none focus:border-white/20 focus:bg-white/10 transition
                                  placeholder-gray-500 @error('email') border-red-500/50 @enderror"
                           placeholder="you@example.com">
                    @error('email')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium mb-2">Password</label>
                    <input type="password" 
                           name="password" 
                           id="password" 
                           required
                           class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3.5 
                                  focus:outline-none focus:border-white/20 focus:bg-white/10 transition
                                  placeholder-gray-500 @error('password') border-red-500/50 @enderror"
                           placeholder="At least 8 characters">
                    @error('password')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                    <p class="mt-2 text-xs text-gray-500">Must be at least 8 characters</p>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium mb-2">Confirm Password</label>
                    <input type="password" 
                           name="password_confirmation" 
                           id="password_confirmation" 
                           required
                           class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3.5 
                                  focus:outline-none focus:border-white/20 focus:bg-white/10 transition
                                  placeholder-gray-500"
                           placeholder="Confirm your password">
                </div>

                <!-- Terms Agreement -->
                <div class="flex items-start gap-2">
                    <input type="checkbox" 
                           id="terms" 
                           required
                           class="w-4 h-4 mt-1 bg-white/5 border border-white/10 rounded 
                                  focus:ring-2 focus:ring-white/20 cursor-pointer">
                    <label for="terms" class="text-sm text-gray-400">
                        I agree to the 
                        <a href="{{ route('terms') }}" class="text-white hover:underline">Terms of Service</a> 
                        and 
                        <a href="{{ route('privacy') }}" class="text-white hover:underline">Privacy Policy</a>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full bg-white text-black py-3.5 rounded-xl font-semibold 
                               hover:bg-gray-200 transition-all duration-200 transform hover:scale-[1.02]">
                    Create Account
                </button>

            </form>

            <!-- Login Link -->
            <p class="mt-8 text-center text-sm text-gray-400">
                Already have an account? 
                <a href="{{ route('loginpage') }}" class="text-white font-medium hover:underline">
                    Sign in instead
                </a>
            </p>

        </div>
    </div>

</div>
@endsection