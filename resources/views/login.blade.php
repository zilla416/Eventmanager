@extends('layouts.app')

@section('title', 'Sign In')

@section('content')
<div class="min-h-screen bg-black text-white flex">
    
    <!-- Left Side - Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-6 lg:p-12">
        <div class="w-full max-w-md">
            
            <!-- Logo -->
            <a href="{{ route('homepage') }}" class="inline-block mb-8 text-2xl font-bold hover:text-gray-300 transition">
                EventManager
            </a>

            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold mb-3">Welcome back</h1>
                <p class="text-gray-400">Sign in to access your account</p>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-xl">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-red-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div class="text-sm">
                            @foreach ($errors->all() as $error)
                                <p class="text-red-400">{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Success Message -->
            @if (session('status'))
                <div class="mb-6 p-4 bg-green-500/10 border border-green-500/20 rounded-xl">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <p class="text-sm text-green-400">{{ session('status') }}</p>
                    </div>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium mb-2">Email</label>
                    <input type="email" 
                           name="email" 
                           id="email" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus
                           class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3.5 
                                  focus:outline-none focus:border-white/20 focus:bg-white/10 transition
                                  placeholder-gray-500"
                           placeholder="you@example.com">
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
                                  placeholder-gray-500"
                           placeholder="Enter your password">
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" 
                               name="remember" 
                               class="w-4 h-4 bg-white/5 border border-white/10 rounded 
                                      focus:ring-2 focus:ring-white/20 cursor-pointer">
                        <span class="text-sm text-gray-400">Remember me</span>
                    </label>
                    <a href="#" class="text-sm text-gray-400 hover:text-white transition">
                        Forgot password?
                    </a>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full bg-white text-black py-3.5 rounded-xl font-semibold 
                               hover:bg-gray-200 transition-all duration-200 transform hover:scale-[1.02]">
                    Sign In
                </button>

            </form>

            <!-- Sign Up Link -->
            <p class="mt-8 text-center text-sm text-gray-400">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-white font-medium hover:underline">
                    Sign up for free
                </a>
            </p>

        </div>
    </div>

    <!-- Right Side - Hero Image -->
    <div class="hidden lg:block lg:w-1/2 relative overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?w=1200" 
                 alt="Concert crowd"
                 class="w-full h-full object-cover brightness-[0.35]">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 to-purple-600/20"></div>
        </div>
        <div class="absolute inset-0 flex items-center justify-center p-12">
            <div class="max-w-lg text-center">
                <h2 class="text-5xl font-bold mb-6">Discover Amazing Events</h2>
                <p class="text-xl text-gray-300 leading-relaxed">
                    Access your tickets, manage your bookings, and never miss out on unforgettable experiences
                </p>
            </div>
        </div>
    </div>

</div>
@endsection