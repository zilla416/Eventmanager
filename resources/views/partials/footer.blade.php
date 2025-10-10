<footer class="border-t border-white/10 mt-24">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid md:grid-cols-5 gap-12">
            
            <!-- Brand -->
            <div class="md:col-span-2">
                <div class="flex items-center gap-2 mb-4">
                    <span class="text-xl font-semibold">EventManager</span>
                </div>
                <p class="text-sm text-gray-400 leading-relaxed mb-6 max-w-sm">
                    Discover and book tickets for the best events in your city. 
                    From concerts to sports, theater to comedy.
                </p>
                <div class="flex gap-3">
                    <a href="#" class="w-9 h-9 rounded-full bg-white/5 hover:bg-white/10 flex items-center justify-center transition">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white/5 hover:bg-white/10 flex items-center justify-center transition">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white/5 hover:bg-white/10 flex items-center justify-center transition">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.14.18-.357.295-.6.295-.002 0-.003 0-.005 0l.213-3.054 5.56-5.022c.24-.213-.054-.334-.373-.121L7.773 13.98l-2.96-.924c-.64-.203-.658-.64.135-.954l11.566-4.458c.538-.196 1.006.128.832.777z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Links -->
            <div>
                <h3 class="font-semibold mb-4">Company</h3>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li><a href="{{ route('about') }}" class="hover:text-white transition">About</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition">Contact</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold mb-4">Support</h3>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li><a href="{{ route('help') }}" class="hover:text-white transition">Help Center</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold mb-4">Legal</h3>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li><a href="{{ route('privacy') }}" class="hover:text-white transition">Privacy</a></li>
                    <li><a href="{{ route('terms') }}" class="hover:text-white transition">Terms</a></li>
                </ul>
            </div>

        </div>

        <!-- Bottom Bar -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-4 pt-8 mt-12 border-t border-white/5 text-sm text-gray-500">
            <p>© 2025 EventManager. All rights reserved.</p>
            <div class="flex items-center gap-6">
                <button class="hover:text-white transition">English</button>
                <button class="hover:text-white transition">EUR €</button>
            </div>
        </div>
    </div>
</footer>