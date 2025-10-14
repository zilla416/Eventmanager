@extends('layouts.app')

@section('title', 'Discover Events')

@section('content')
<!-- Hero Section -->
<div class="relative min-h-[100svh] md:min-h-screen overflow-hidden bg-black">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="{{ Vite::asset('resources/img/concert1.png') }}" 
             alt="Hero background" 
             class="w-full h-full object-cover brightness-[0.35]">
        <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black"></div>
    </div>

    <!-- Hero Content -->
    <div class="relative z-10 min-h-[100svh] md:min-h-screen flex flex-col justify-center items-center text-center px-4 md:px-8">
        <div class="max-w-5xl mx-auto space-y-6 md:space-y-8">
            
            <!-- Main Heading -->
            <h1 class="text-4xl md:text-7xl lg:text-8xl font-bold tracking-tight leading-tight">
                Discover Your Next<br>Unforgettable Experience
            </h1>
            
            <!-- Subheading -->
            <p class="text-lg md:text-2xl text-gray-300 max-w-2xl mx-auto">
                Find and book tickets to the best events in your city
            </p>

            <!-- Search Bar -->
            <div class="max-w-3xl mx-auto mt-8 md:mt-12">
                <div class="bg-white rounded-2xl p-2 md:p-3 shadow-2xl">
                    <div class="flex flex-col md:flex-row gap-2 md:gap-3">
                        <div class="flex-1">
                            <input type="text" 
                                   id="eventSearch"
                                   placeholder="Search events..." 
                                   class="w-full px-4 md:px-6 py-3 md:py-4 bg-transparent text-black placeholder-gray-500 focus:outline-none text-base md:text-lg">
                        </div>
                        <div class="flex-1">
                            <input type="text" 
                                   id="locationSearch"
                                   placeholder="Utrecht" 
                                   class="w-full px-4 md:px-6 py-3 md:py-4 bg-transparent text-black placeholder-gray-500 focus:outline-none text-base md:text-lg border-t md:border-t-0 md:border-l border-gray-200">
                        </div>
                        <button id="heroSearchBtn" class="px-6 md:px-8 py-3 md:py-4 bg-black text-white rounded-xl font-semibold hover:bg-gray-900 transition-all duration-200 whitespace-nowrap">
                            Search
                        </button>
                    </div>
                </div>
            </div>

            <!-- Quick Categories -->
            <div class="flex flex-wrap gap-2 md:gap-3 justify-center mt-8 md:mt-12">
                <button data-quick-category="music" class="px-4 md:px-6 py-2 md:py-3 bg-white/10 backdrop-blur-md rounded-full border border-white/20 hover:bg-white/20 transition-all duration-200 text-sm md:text-base">
                    <span class="font-medium"> Music</span>
                </button>
                <button data-quick-category="sports" class="px-4 md:px-6 py-2 md:py-3 bg-white/10 backdrop-blur-md rounded-full border border-white/20 hover:bg-white/20 transition-all duration-200 text-sm md:text-base">
                    <span class="font-medium"> Sports</span>
                </button>
                <button data-quick-category="theater" class="px-4 md:px-6 py-2 md:py-3 bg-white/10 backdrop-blur-md rounded-full border border-white/20 hover:bg-white/20 transition-all duration-200 text-sm md:text-base">
                    <span class="font-medium"> Theater</span>
                </button>
                <button data-quick-category="comedy" class="px-4 md:px-6 py-2 md:py-3 bg-white/10 backdrop-blur-md rounded-full border border-white/20 hover:bg-white/20 transition-all duration-200 text-sm md:text-base">
                    <span class="font-medium"> Comedy</span>
                </button>
                <button data-quick-category="family" class="px-4 md:px-6 py-2 md:py-3 bg-white/10 backdrop-blur-md rounded-full border border-white/20 hover:bg-white/20 transition-all duration-200 text-sm md:text-base">
                    <span class="font-medium"> Family</span>
                </button>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-3 gap-4 md:gap-8 max-w-3xl mx-auto mt-12 md:mt-16">
                <div class="text-center">
                    <div class="text-2xl md:text-4xl font-bold mb-1 md:mb-2">10K+</div>
                    <div class="text-xs md:text-base text-gray-400">Events</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl md:text-4xl font-bold mb-1 md:mb-2">500K+</div>
                    <div class="text-xs md:text-base text-gray-400">Happy Customers</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl md:text-4xl font-bold mb-1 md:mb-2">50+</div>
                    <div class="text-xs md:text-base text-gray-400">Cities</div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Main Content -->
<div id="events-section" class="bg-black text-white min-h-screen">
    <div class="max-w-7xl mx-auto px-6 md:px-8 py-20">
        
        <!-- Section Header -->
        <div class="mb-12">
            <h2 class="text-4xl md:text-5xl font-bold mb-3">Upcoming Events</h2>
            <p class="text-lg text-gray-400">Don't miss out on these amazing experiences</p>
        </div>

        <!-- Category Filters -->
        <div class="flex gap-3 mb-16 overflow-x-auto pb-3 scrollbar-hide">
            <button class="category-filter active px-6 py-3 bg-white text-black rounded-full text-sm font-semibold whitespace-nowrap transition-all duration-200 hover:bg-gray-200" data-category="all">
                All Events
            </button>
            <button class="category-filter px-6 py-3 bg-white/5 hover:bg-white/10 rounded-full text-sm font-medium whitespace-nowrap transition-all duration-200 border border-white/10 hover:border-white/20" data-category="music">
                Music
            </button>
            <button class="category-filter px-6 py-3 bg-white/5 hover:bg-white/10 rounded-full text-sm font-medium whitespace-nowrap transition-all duration-200 border border-white/10 hover:border-white/20" data-category="sports">
                Sports
            </button>
            <button class="category-filter px-6 py-3 bg-white/5 hover:bg-white/10 rounded-full text-sm font-medium whitespace-nowrap transition-all duration-200 border border-white/10 hover:border-white/20" data-category="theater">
                Theater
            </button>
            <button class="category-filter px-6 py-3 bg-white/5 hover:bg-white/10 rounded-full text-sm font-medium whitespace-nowrap transition-all duration-200 border border-white/10 hover:border-white/20" data-category="comedy">
                Comedy
            </button>
            <button class="category-filter px-6 py-3 bg-white/5 hover:bg-white/10 rounded-full text-sm font-medium whitespace-nowrap transition-all duration-200 border border-white/10 hover:border-white/20" data-category="family">
                Family
            </button>
        </div>

        @if($events->count() > 0)
        <!-- No Results Message (hidden by default) -->
        <div id="noResultsMessage" class="text-center py-32 hidden">
            <div class="w-20 h-20 rounded-full bg-white/5 flex items-center justify-center mx-auto mb-6 border border-white/10">
                <svg class="w-10 h-10 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold mb-3">No events found</h3>
            <p class="text-gray-400 text-lg mb-6">We couldn't find any events matching "<span id="searchTermDisplay" class="text-white font-semibold"></span>"</p>
            <div class="flex gap-4 justify-center">
                <button id="clearSearchBtn" class="px-8 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition-all duration-200">
                    Clear Search
                </button>
                <button onclick="document.getElementById('eventSearch').focus()" class="px-8 py-3 border border-white/20 rounded-full hover:bg-white/5 transition-all duration-200 font-medium">
                    Try Different Keywords
                </button>
            </div>
        </div>

        <!-- No Category Results Message (hidden by default) -->
        <div id="noCategoryResultsMessage" class="text-center py-32 hidden">
            <div class="w-20 h-20 rounded-full bg-white/5 flex items-center justify-center mx-auto mb-6 border border-white/10">
                <svg class="w-10 h-10 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold mb-3">No <span id="categoryNameDisplay"></span> events yet</h3>
            <p class="text-gray-400 text-lg mb-6">Check back soon or explore other categories</p>
            <button id="backToAllBtn" class="px-8 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition-all duration-200">
                View All Events
            </button>
        </div>

        <!-- Events Grid -->
        <div id="eventsGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
            @foreach($events as $event)
            <a href="{{ route('eventpage') }}" class="event-card group block" data-category="{{ strtolower($event->category) }}">
                <div class="bg-white/5 rounded-2xl overflow-hidden border border-white/10 hover:border-white/20 transition-all duration-300 h-full hover:transform hover:scale-[1.02]">
                    <!-- Event Image -->
                    <div class="aspect-[16/10] overflow-hidden bg-white/5">
                        <img src="{{ Vite::asset($event->image) }}" 
                             alt="{{ $event->title }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-700 ease-out">
                    </div>
                    
                    <!-- Event Details -->
                    <div class="p-6">
                        <!-- Meta Info -->
                        <div class="flex items-center gap-2 text-xs text-gray-500 mb-3 flex-wrap">
                            <span class="px-3 py-1 bg-white/5 rounded-full border border-white/10">{{ strtoupper($event->category) }}</span>
                            <span></span>
                            <span>{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</span>
                            <span></span>
                            <span>{{ \Carbon\Carbon::parse($event->time)->format('H:i') }}</span>
                        </div>
                        
                        <!-- Title -->
                        <h3 class="text-xl font-bold mb-2 group-hover:text-gray-300 transition line-clamp-2">
                            {{ $event->title }}
                        </h3>
                        
                        <!-- Location -->
                        <p class="text-sm text-gray-400 mb-2 flex items-center gap-2">
                            <span class="truncate">{{ $event->location }}</span>
                        </p>
                        
                        <!-- Description -->
                        <p class="text-sm text-gray-500 mb-4 line-clamp-2">
                            {{ $event->description }}
                        </p>
                        
                        <!-- Price & Availability -->
                        <div class="flex items-center justify-between pt-4 border-t border-white/10">
                            <div>
                                <p class="text-xs text-gray-500 mb-1">From</p>
                                <p class="text-xl font-bold">€{{ number_format($event->price, 2) }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-gray-500 mb-1">Available</p>
                                <p class="text-sm font-semibold text-green-400">{{ $event->available_spots }} spots</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <!-- Load More Button -->
        <div class="text-center">
            <button id="loadMoreBtn" class="px-10 py-4 border border-white/20 rounded-full hover:bg-white/5 transition-all duration-200 text-sm font-medium hover:border-white/30">
                Show More Events
            </button>
        </div>

        @else
        <!-- Empty State -->
        <div class="text-center py-32">
            <div class="w-20 h-20 rounded-full bg-white/5 flex items-center justify-center mx-auto mb-6 border border-white/10">
                <svg class="w-10 h-10 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold mb-3">No events available</h3>
            <p class="text-gray-400 text-lg">Check back soon for upcoming events</p>
        </div>
        @endif

    </div>

    <!-- CTA Section -->
    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-6 md:px-8 py-24">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                    Create your own event
                </h2>
                <p class="text-xl text-gray-400 mb-12 leading-relaxed">
                    Join thousands of organizers who trust EventManager to sell tickets and manage their events seamlessly
                </p>
                <div class="flex gap-4 justify-center flex-wrap">
                    <a href="{{ route('loginpage') }}" class="px-10 py-4 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition-all duration-200">
                        Get Started Free
                    </a>
                    <a href="{{ route('about') }}" class="px-10 py-4 border border-white/20 rounded-full hover:bg-white/5 transition-all duration-200 font-medium hover:border-white/30">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

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
        const filterButtons = document.querySelectorAll('.category-filter');
        const eventCards = document.querySelectorAll('.event-card');
        
        // Check for hash in URL (from header category links)
        const hash = window.location.hash.substring(1);
        if (hash && ['sports', 'music', 'theater', 'comedy', 'family'].includes(hash)) {
            const eventsSection = document.getElementById('events-section');
            if (eventsSection) {
                setTimeout(() => {
                    eventsSection.scrollIntoView({ behavior: 'smooth' });
                }, 100);
            }
            
            const filterButton = document.querySelector(`[data-category="${hash}"]`);
            if (filterButton) {
                setTimeout(() => filterButton.click(), 300);
            }
        }
        
        // Check for search parameter in URL
        const urlParams = new URLSearchParams(window.location.search);
        const searchParam = urlParams.get('search');
        if (searchParam) {
            const eventSearchInput = document.getElementById('eventSearch');
            if (eventSearchInput) {
                eventSearchInput.value = searchParam;
            }
            
            setTimeout(() => {
                const eventsSection = document.getElementById('events-section');
                if (eventsSection) {
                    eventsSection.scrollIntoView({ behavior: 'smooth' });
                }
                filterEventsBySearch(searchParam);
            }, 100);
        }
        
        function filterEventsBySearch(searchTerm) {
            const term = searchTerm.toLowerCase();
            let visibleCount = 0;
            
            eventCards.forEach(card => {
                const title = card.querySelector('h3')?.textContent.toLowerCase() || '';
                const description = card.querySelector('.line-clamp-2')?.textContent.toLowerCase() || '';
                
                if (title.includes(term) || description.includes(term)) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });
            
            // Show/hide no results message
            const noResultsMessage = document.getElementById('noResultsMessage');
            const eventsGrid = document.getElementById('eventsGrid');
            const loadMoreBtn = document.getElementById('loadMoreBtn');
            
            if (visibleCount === 0) {
                noResultsMessage.classList.remove('hidden');
                eventsGrid.classList.add('hidden');
                if (loadMoreBtn) loadMoreBtn.parentElement.classList.add('hidden');
                document.getElementById('searchTermDisplay').textContent = searchTerm;
            } else {
                noResultsMessage.classList.add('hidden');
                eventsGrid.classList.remove('hidden');
                if (loadMoreBtn) loadMoreBtn.parentElement.classList.remove('hidden');
            }
            
            filterButtons.forEach(btn => {
                if (btn.dataset.category === 'all') {
                    btn.classList.add('active', 'bg-white', 'text-black', 'font-semibold');
                    btn.classList.remove('bg-white/5', 'text-white', 'font-medium');
                } else {
                    btn.classList.remove('active', 'bg-white', 'text-black', 'font-semibold');
                    btn.classList.add('bg-white/5', 'text-white', 'font-medium');
                }
            });
        }
        
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const category = this.dataset.category;
                
                filterButtons.forEach(btn => {
                    btn.classList.remove('active', 'bg-white', 'text-black', 'font-semibold');
                    btn.classList.add('bg-white/5', 'text-white', 'font-medium');
                });
                this.classList.add('active', 'bg-white', 'text-black', 'font-semibold');
                this.classList.remove('bg-white/5', 'text-white', 'font-medium');
                
                let visibleCount = 0;
                eventCards.forEach(card => {
                    if (category === 'all' || card.dataset.category === category) {
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });
                
                // Show/hide category no results message
                const noResultsMessage = document.getElementById('noResultsMessage');
                const noCategoryResultsMessage = document.getElementById('noCategoryResultsMessage');
                const eventsGrid = document.getElementById('eventsGrid');
                const loadMoreBtn = document.getElementById('loadMoreBtn');
                
                noResultsMessage.classList.add('hidden');
                
                if (visibleCount === 0 && category !== 'all') {
                    noCategoryResultsMessage.classList.remove('hidden');
                    eventsGrid.classList.add('hidden');
                    if (loadMoreBtn) loadMoreBtn.parentElement.classList.add('hidden');
                    
                    // Set category name for display
                    const categoryName = category.charAt(0).toUpperCase() + category.slice(1);
                    document.getElementById('categoryNameDisplay').textContent = categoryName;
                } else {
                    noCategoryResultsMessage.classList.add('hidden');
                    eventsGrid.classList.remove('hidden');
                    if (loadMoreBtn) loadMoreBtn.parentElement.classList.remove('hidden');
                }
                
                // Clear search input
                const eventSearchInput = document.getElementById('eventSearch');
                if (eventSearchInput) {
                    eventSearchInput.value = '';
                }
            });
        });

        const searchButton = document.getElementById('heroSearchBtn');
        const eventSearchInput = document.getElementById('eventSearch');

        if (searchButton) {
            searchButton.addEventListener('click', function() {
                const searchTerm = eventSearchInput.value;
                const eventsSection = document.getElementById('events-section');
                if (eventsSection) {
                    eventsSection.scrollIntoView({ behavior: 'smooth' });
                }
                if (searchTerm) {
                    filterEventsBySearch(searchTerm);
                }
            });
            
            eventSearchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    searchButton.click();
                }
            });
        }

        const quickCategoryButtons = document.querySelectorAll('[data-quick-category]');
        quickCategoryButtons.forEach(button => {
            button.addEventListener('click', function() {
                const category = this.dataset.quickCategory;
                const eventsSection = document.getElementById('events-section');
                if (eventsSection) {
                    eventsSection.scrollIntoView({ behavior: 'smooth' });
                }
                const filterButton = document.querySelector(`[data-category="${category}"]`);
                if (filterButton) {
                    setTimeout(() => filterButton.click(), 500);
                }
            });
        });

        const loadMoreBtn = document.getElementById('loadMoreBtn');
        if (loadMoreBtn) {
            let currentlyShown = 12; // Initial number of events shown
            const eventCardsArray = Array.from(eventCards);
            
            // Initially hide events beyond the first 12
            eventCardsArray.forEach((card, index) => {
                if (index >= 12) {
                    card.classList.add('hidden-extra');
                    card.style.display = 'none';
                }
            });
            
            loadMoreBtn.addEventListener('click', function() {
                const hiddenCards = eventCardsArray.filter(card => card.classList.contains('hidden-extra'));
                const nextBatch = hiddenCards.slice(0, 6); // Show 6 more at a time
                
                nextBatch.forEach(card => {
                    card.classList.remove('hidden-extra');
                    card.style.display = 'block';
                    currentlyShown++;
                });
                
                // Hide button if all events are shown
                if (currentlyShown >= eventCardsArray.length) {
                    loadMoreBtn.parentElement.style.display = 'none';
                }
            });
            
            // Check if we need the button at all
            if (eventCardsArray.length <= 12) {
                loadMoreBtn.parentElement.style.display = 'none';
            }
        }

        // Clear Search Button
        const clearSearchBtn = document.getElementById('clearSearchBtn');
        if (clearSearchBtn) {
            clearSearchBtn.addEventListener('click', function() {
                // Clear search input
                const eventSearchInput = document.getElementById('eventSearch');
                if (eventSearchInput) {
                    eventSearchInput.value = '';
                }
                
                // Show all events
                eventCards.forEach(card => {
                    card.style.display = 'block';
                });
                
                // Hide no results message
                const noResultsMessage = document.getElementById('noResultsMessage');
                const eventsGrid = document.getElementById('eventsGrid');
                const loadMoreBtn = document.getElementById('loadMoreBtn');
                
                noResultsMessage.classList.add('hidden');
                eventsGrid.classList.remove('hidden');
                if (loadMoreBtn) loadMoreBtn.parentElement.classList.remove('hidden');
                
                // Reset to "All Events" filter
                filterButtons.forEach(btn => {
                    if (btn.dataset.category === 'all') {
                        btn.classList.add('active', 'bg-white', 'text-black', 'font-semibold');
                        btn.classList.remove('bg-white/5', 'text-white', 'font-medium');
                    } else {
                        btn.classList.remove('active', 'bg-white', 'text-black', 'font-semibold');
                        btn.classList.add('bg-white/5', 'text-white', 'font-medium');
                    }
                });
                
                // Scroll back to events section
                const eventsSection = document.getElementById('events-section');
                if (eventsSection) {
                    eventsSection.scrollIntoView({ behavior: 'smooth' });
                }
            });
        }

        // Back to All Events Button
        const backToAllBtn = document.getElementById('backToAllBtn');
        if (backToAllBtn) {
            backToAllBtn.addEventListener('click', function() {
                // Click the "All Events" filter button
                const allEventsBtn = document.querySelector('[data-category="all"]');
                if (allEventsBtn) {
                    allEventsBtn.click();
                }
            });
        }
    });
</script>
@endsection
