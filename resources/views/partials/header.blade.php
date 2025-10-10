<header class="sticky top-0 z-50 backdrop-blur-xl bg-black/80 border-b border-white/10">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Top Bar -->
        <div class="flex items-center justify-between py-4">
            
            <!-- Logo -->
            <a href="{{ route('homepage') }}" class="flex items-center gap-2 group">
                <span class="text-xl font-semibold group-hover:text-gray-300 transition">EventManager</span>
            </a>

            <!-- Search Bar -->
            <div class="hidden md:flex items-center flex-1 max-w-md mx-8">
                <div class="relative w-full">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500" 
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" 
                           id="headerSearch"
                           placeholder="Search events..." 
                           class="w-full bg-white/5 border border-white/10 rounded-full py-2.5 pl-12 pr-4 text-sm 
                                  placeholder-gray-500 focus:outline-none focus:border-white/20 focus:bg-white/10 transition">
                </div>
            </div>

            <!-- Right Actions -->
            <div class="flex items-center gap-3">
                <button id="locationBtn" class="hidden md:flex items-center gap-2 px-3 py-2 text-sm text-gray-300 hover:text-white transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span id="locationText">Utrecht</span>
                </button>
                
                <a href="{{ route('register') }}" 
                   class="hidden md:block px-4 py-2 text-sm hover:bg-white/5 rounded-lg transition">
                    Sign in
                </a>
                
                <a href="{{ route('loginpage') }}" 
                   class="px-4 py-2 bg-white text-black rounded-lg text-sm font-medium hover:bg-gray-200 transition">
                    Get Started
                </a>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex items-center gap-1 py-2 text-sm border-t border-white/5 overflow-x-auto">
            <a href="{{ route('homepage') }}#sports" class="nav-category px-4 py-2 text-gray-400 hover:text-white hover:bg-white/5 rounded-lg transition whitespace-nowrap" data-category="sports">Sports</a>
            <a href="{{ route('homepage') }}#music" class="nav-category px-4 py-2 text-gray-400 hover:text-white hover:bg-white/5 rounded-lg transition whitespace-nowrap" data-category="music">Concerts</a>
            <a href="{{ route('homepage') }}#theater" class="nav-category px-4 py-2 text-gray-400 hover:text-white hover:bg-white/5 rounded-lg transition whitespace-nowrap" data-category="theater">Theater</a>
            <a href="{{ route('homepage') }}#comedy" class="nav-category px-4 py-2 text-gray-400 hover:text-white hover:bg-white/5 rounded-lg transition whitespace-nowrap" data-category="comedy">Comedy</a>
            <a href="{{ route('homepage') }}#family" class="nav-category px-4 py-2 text-gray-400 hover:text-white hover:bg-white/5 rounded-lg transition whitespace-nowrap" data-category="family">Family</a>
            <div class="flex-1"></div>
            <a href="{{ route('about') }}" class="px-4 py-2 text-blue-400 hover:text-blue-300 hover:bg-blue-500/10 rounded-lg transition whitespace-nowrap font-medium">
                Sell Tickets
            </a>
        </nav>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Header Search Functionality
        const headerSearch = document.getElementById('headerSearch');
        if (headerSearch) {
            headerSearch.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    const searchTerm = this.value;
                    if (searchTerm) {
                        // Redirect to homepage with search parameter
                        window.location.href = `{{ route('homepage') }}?search=${encodeURIComponent(searchTerm)}`;
                    }
                }
            });
        }

        // Location Button (placeholder for future functionality)
        const locationBtn = document.getElementById('locationBtn');
        if (locationBtn) {
            locationBtn.addEventListener('click', function() {
                const newLocation = prompt('Enter your city:', document.getElementById('locationText').textContent);
                if (newLocation) {
                    document.getElementById('locationText').textContent = newLocation;
                    localStorage.setItem('userLocation', newLocation);
                }
            });
            
            // Load saved location
            const savedLocation = localStorage.getItem('userLocation');
            if (savedLocation) {
                document.getElementById('locationText').textContent = savedLocation;
            }
        }
    });
</script>