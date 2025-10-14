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
                
                @auth
                    <!-- Shopping Cart Button -->
                    <a href="{{ route('checkout') }}" class="relative group">
                        <button class="w-10 h-10 bg-white/5 hover:bg-white/10 border border-white/10 rounded-full flex items-center justify-center transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            <!-- Cart Badge (when items in cart) -->
                            <span id="cartBadge" style="display: none;" class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs font-bold rounded-full flex items-center justify-center">
                                0
                            </span>
                        </button>
                    </a>
                    
                    <!-- User Avatar Dropdown -->
                    <div class="relative">
                        <button id="userMenuBtn" class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-sm font-bold hover:opacity-80 transition">
                            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div id="userDropdown" class="hidden absolute right-0 mt-2 w-56 bg-black/95 backdrop-blur-xl border border-white/10 rounded-2xl shadow-xl overflow-hidden">
                            <div class="px-4 py-3 border-b border-white/10">
                                <div class="font-semibold">{{ auth()->user()->name }}</div>
                                <div class="text-sm text-gray-400 truncate">{{ auth()->user()->email }}</div>
                            </div>
                            <div class="py-2">
                                <!-- Customer (is_admin = 0) -->
                                @if(auth()->user()->is_admin == 0)
                                    <a href="{{ route('account') }}" class="flex items-center gap-3 px-4 py-2 text-sm hover:bg-white/5 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        <span>My Profile</span>
                                    </a>
                                    <a href="{{ route('account') }}?tab=tickets" class="flex items-center gap-3 px-4 py-2 text-sm hover:bg-white/5 transition" onclick="showTabFromUrl('tickets')">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                                        </svg>
                                        <span>My Tickets</span>
                                    </a>
                                    <a href="{{ route('account') }}?tab=settings" class="flex items-center gap-3 px-4 py-2 text-sm hover:bg-white/5 transition" onclick="showTabFromUrl('settings')">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <span>Settings</span>
                                    </a>
                                @endif
                                
                                <!-- Organizer (is_admin = 1) -->
                                @if(auth()->user()->is_admin == 1)
                                    <a href="{{ route('account') }}" class="flex items-center gap-3 px-4 py-2 text-sm hover:bg-white/5 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        <span>My Profile</span>
                                    </a>
                                    <a href="{{ route('organizer.cms') }}" class="flex items-center gap-3 px-4 py-2 text-sm hover:bg-white/5 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <span>Organizer Dashboard</span>
                                    </a>
                                    <a href="{{ route('account') }}?tab=settings" class="flex items-center gap-3 px-4 py-2 text-sm hover:bg-white/5 transition" onclick="showTabFromUrl('settings')">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <span>Settings</span>
                                    </a>
                                @endif
                                
                                <!-- Admin/Website Owner (is_admin = 2) -->
                                @if(auth()->user()->is_admin == 2)
                                    <a href="{{ route('account') }}" class="flex items-center gap-3 px-4 py-2 text-sm hover:bg-white/5 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        <span>My Profile</span>
                                    </a>
                                    <a href="{{ route('admin.cms') }}" class="flex items-center gap-3 px-4 py-2 text-sm hover:bg-white/5 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                        </svg>
                                        <span>Admin Dashboard</span>
                                    </a>
                                    <a href="{{ route('organizer.cms') }}" class="flex items-center gap-3 px-4 py-2 text-sm hover:bg-white/5 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <span>Organizer Dashboard</span>
                                    </a>
                                    <a href="{{ route('account') }}?tab=settings" class="flex items-center gap-3 px-4 py-2 text-sm hover:bg-white/5 transition" onclick="showTabFromUrl('settings')">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <span>Settings</span>
                                    </a>
                                @endif
                            </div>
                            <div class="border-t border-white/10">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-sm text-red-400 hover:bg-red-500/10 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                        <span>Sign Out</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('loginpage') }}" 
                       class="hidden md:block px-4 py-2 text-sm hover:bg-white/5 rounded-lg transition">
                        Sign in
                    </a>
                    
                    <a href="{{ route('register') }}" 
                       class="px-4 py-2 bg-white text-black rounded-lg text-sm font-medium hover:bg-gray-200 transition">
                        Get Started
                    </a>
                @endauth
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex items-center gap-1 py-2 text-sm border-t border-white/5 overflow-x-auto scrollbar-hide">
            <a href="{{ route('homepage') }}" class="header-category px-4 py-2 text-gray-400 hover:text-white hover:bg-white/5 rounded-lg transition whitespace-nowrap" data-category="music">Music</a>
            <a href="{{ route('homepage') }}" class="header-category px-4 py-2 text-gray-400 hover:text-white hover:bg-white/5 rounded-lg transition whitespace-nowrap" data-category="sports">Sports</a>
            <a href="{{ route('homepage') }}" class="header-category px-4 py-2 text-gray-400 hover:text-white hover:bg-white/5 rounded-lg transition whitespace-nowrap" data-category="theater">Theater</a>
            <a href="{{ route('homepage') }}" class="header-category px-4 py-2 text-gray-400 hover:text-white hover:bg-white/5 rounded-lg transition whitespace-nowrap" data-category="comedy">Comedy</a>
            <a href="{{ route('homepage') }}" class="header-category px-4 py-2 text-gray-400 hover:text-white hover:bg-white/5 rounded-lg transition whitespace-nowrap" data-category="family">Family</a>
            <div class="flex-1"></div>
            <a href="{{ route('contact') }}" class="px-4 py-2 text-blue-400 hover:text-blue-300 hover:bg-blue-500/10 rounded-lg transition whitespace-nowrap font-medium">
                Sell Tickets
            </a>
        </nav>
    </div>
</header>

<style>
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}
.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Update Cart Badge
        function updateCartBadge() {
            const cartBadge = document.getElementById('cartBadge');
            if (cartBadge) {
                // Get cart items from localStorage or session
                const cart = JSON.parse(localStorage.getItem('cart') || '[]');
                const itemCount = cart.reduce((total, item) => total + (item.quantity || 1), 0);
                
                if (itemCount > 0) {
                    cartBadge.textContent = itemCount;
                    cartBadge.style.display = 'flex';
                } else {
                    cartBadge.style.display = 'none';
                }
            }
        }
        
        // Update badge on page load
        updateCartBadge();
        
        // Listen for cart updates (can be triggered from other pages)
        window.addEventListener('cartUpdated', updateCartBadge);
        
        // Header Search Functionality
        const headerSearch = document.getElementById('headerSearch');
        if (headerSearch) {
            headerSearch.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    const searchTerm = this.value;
                    if (searchTerm) {
                        window.location.href = `{{ route('homepage') }}?search=${encodeURIComponent(searchTerm)}`;
                    }
                }
            });
        }

        // Header Category Links - Make them functional
        const headerCategories = document.querySelectorAll('.header-category');
        headerCategories.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const category = this.dataset.category;
                const currentPage = window.location.pathname;
                
                // If already on homepage, trigger filter
                if (currentPage === '/' || currentPage === '/home') {
                    const eventsSection = document.getElementById('events-section');
                    if (eventsSection) {
                        eventsSection.scrollIntoView({ behavior: 'smooth' });
                    }
                    
                    // Find and click the filter button
                    setTimeout(() => {
                        const filterButton = document.querySelector(`.category-filter[data-category="${category}"]`);
                        if (filterButton) {
                            filterButton.click();
                        }
                    }, 400);
                } else {
                    // Redirect to homepage with hash
                    window.location.href = `{{ route('homepage') }}#${category}`;
                }
            });
        });

        // Location Button
        const locationBtn = document.getElementById('locationBtn');
        if (locationBtn) {
            locationBtn.addEventListener('click', function() {
                const newLocation = prompt('Enter your city:', document.getElementById('locationText').textContent);
                if (newLocation) {
                    document.getElementById('locationText').textContent = newLocation;
                    localStorage.setItem('userLocation', newLocation);
                }
            });
            
            const savedLocation = localStorage.getItem('userLocation');
            if (savedLocation) {
                document.getElementById('locationText').textContent = savedLocation;
            }
        }

        // User Dropdown Menu
        const userMenuBtn = document.getElementById('userMenuBtn');
        const userDropdown = document.getElementById('userDropdown');
        
        if (userMenuBtn && userDropdown) {
            userMenuBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                userDropdown.classList.toggle('hidden');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!userMenuBtn.contains(e.target) && !userDropdown.contains(e.target)) {
                    userDropdown.classList.add('hidden');
                }
            });

            // Prevent dropdown from closing when clicking inside
            userDropdown.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        }
    });
</script>
