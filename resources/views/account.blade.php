<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/app.css'])
    @stack('styles')
</head>

<body class="max-w-7xl mx-auto bg-gray-50">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="flex flex-col">
            <div class="pt-6 pb-3 flex flex-row justify-between items-center border-b border-gray-200">
                <h1 class="text-blue-600 font-bold text-3xl">EventManager</h1>
                <div onmousedown="event.preventDefault()" onclick="document.getElementById('search-input').focus();" class="flex flew-row items-center gap-3 border border-gray-300 rounded-lg text-md pl-4 pr-10 py-2 w-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    <input id="search-input" class="outline-none w-full" type="text" placeholder="Search for events, artists, teams, and more">
                </div>
                <div id="header-buttons" class="flex flex-row items-center gap-2 font-semibold">
                    <a class="flex flex-row items-center gap-3 py-2 px-4 rounded-lg duration-300 transition hover:bg-gray-200" href=""><img
                            class="w-5 h-5" src="{{ Vite::asset('resources/img/location-icon.png') }}" alt="">Utrecht,
                        NL</a>
                    <a class="py-2 px-4 rounded-lg duration-300 transition hover:bg-gray-200" href="{{ route('register') }}">Sign In</a>
                    <a class="flex flex-row items-center gap-3 bg-blue-600 text-white py-2 px-4 rounded-lg duration-300 transition hover:bg-blue-700"
                        href="{{ route('loginpage') }}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                        Account</a>
                </div>
            </div>
            <nav class="flex flex-row items-center gap-6 py-3 font-medium">
                <a class="duration-100 transition hover:text-blue-600" href="#">Sports</a>
                <a class="duration-100 transition hover:text-blue-600" href="#">Concerts</a>
                <a class="duration-100 transition hover:text-blue-600" href="#">Theater</a>
                <a class="duration-100 transition hover:text-blue-600" href="#">Comedy</a>
                <a class="duration-100 transition hover:text-blue-600" href="#">Family</a>
                <a class="duration-100 transition hover:text-blue-600" href="#">Sell Tickets</a>
            </nav>
        </header>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Upcoming Events Card -->
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-calendar-alt text-blue-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-2xl font-bold text-gray-900">{{ count($upcomingEvents) }}</h3>
                            <p class="text-gray-600">Upcoming Events</p>
                        </div>
                    </div>
                </div>

                <!-- Total Tickets Card -->
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-ticket-alt text-green-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-2xl font-bold text-gray-900">{{ $totalTickets }}</h3>
                            <p class="text-gray-600">Total Tickets</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Tabs -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-8">
                <div class="border-b border-gray-200">
                    <nav class="flex space-x-8 px-6">
                        <button onclick="switchTab('tickets')" id="tickets-tab" class="tab-link py-4 px-1 border-b-2 border-blue-500 text-blue-600 font-medium text-sm">
                            My Tickets
                        </button>
                        <button onclick="switchTab('settings')" id="settings-tab" class="tab-link py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium text-sm">
                            Account Settings
                        </button>
                    </nav>
                </div>

                <!-- My Tickets Tab Content -->
                <div id="tickets-content" class="tab-content p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Upcoming Events</h2>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        @foreach($upcomingEvents as $event)
                        <!-- {{ $event['title'] }} Event Card -->
                        <div class="flex bg-gray-50 rounded-lg p-4">
                            <div class="w-24 h-24 {{ $event['color'] }} rounded-lg flex-shrink-0 mr-4 relative overflow-hidden">
                                <div class="w-full h-full flex items-center justify-center text-white">
                                    <i class="{{ $event['icon'] }} text-2xl"></i>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-semibold text-gray-900">{{ $event['title'] }}</h3>
                                    <span class="bg-orange-100 text-orange-800 text-xs px-2 py-1 rounded-full">{{ $event['user_tickets'] }} {{ $event['user_tickets'] == 1 ? 'ticket' : 'tickets' }}</span>
                                </div>
                                <div class="text-sm text-gray-600 space-y-1">
                                    <p><i class="far fa-calendar mr-2"></i>{{ \Carbon\Carbon::parse($event['date'])->format('M j, Y') }}</p>
                                    <p><i class="far fa-clock mr-2"></i>{{ \Carbon\Carbon::parse($event['time'])->format('g:i A') }}</p>
                                    <p><i class="fas fa-map-marker-alt mr-2"></i>{{ $event['location'] }}</p>
                                    <p><i class="fas fa-map-pin mr-2"></i>{{ $event['address'] }}</p>
                                    <p class="font-medium text-gray-700">{{ $event['description'] }}</p>
                                </div>
                                <div class="flex justify-between items-center mt-4">
                                    <div class="text-xs text-blue-600 font-medium">
                                        You own {{ $event['user_tickets'] }} {{ $event['user_tickets'] == 1 ? 'ticket' : 'tickets' }} for this event
                                    </div>
                                    <div class="flex space-x-3">
                                        <button class="flex items-center px-3 py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                                            <i class="fas fa-download mr-2"></i>Download
                                        </button>
                                        <button class="px-3 py-2 text-sm bg-gray-900 text-white rounded-lg hover:bg-gray-800">
                                            View Details
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Account Settings Tab Content -->
                <div id="settings-content" class="tab-content p-6 hidden">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Account Settings</h2>

                    <div class="max-w-2xl">
                        <!-- Profile Information Section -->
                        <div class="bg-gray-50 rounded-lg p-6 mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Profile Information</h3>
                            <form class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                                        <input type="text" id="first_name" name="first_name" value="John" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                        <input type="text" id="last_name" name="last_name" value="Doe" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                    <input type="email" id="email" name="email" value="john.doe@example.com" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                    <input type="tel" id="phone" name="phone" value="+1 (555) 123-4567" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
                                        Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Password Change Section -->
                        <div class="bg-gray-50 rounded-lg p-6 mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Change Password</h3>
                            <form class="space-y-4">
                                <div>
                                    <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                                    <input type="password" id="current_password" name="current_password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="new_password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                                    <input type="password" id="new_password" name="new_password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                                    <input type="password" id="confirm_password" name="confirm_password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
                                        Update Password
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Notification Preferences -->
                        <div class="bg-gray-50 rounded-lg p-6 mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Notification Preferences</h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-900">Email Notifications</h4>
                                        <p class="text-sm text-gray-500">Receive notifications about events and updates via email</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    </label>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-900">SMS Notifications</h4>
                                        <p class="text-sm text-gray-500">Receive text message alerts for important updates</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    </label>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-900">Event Reminders</h4>
                                        <p class="text-sm text-gray-500">Get reminded about upcoming events you're attending</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Danger Zone -->
                        <div class="bg-red-50 border border-red-200 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-red-900 mb-4">Danger Zone</h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium text-red-900">Delete Account</h4>
                                        <p class="text-sm text-red-600">Permanently delete your account and all associated data</p>
                                    </div>
                                    <button class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:ring-2 focus:ring-red-500">
                                        Delete Account
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function switchTab(tabName) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });

            // Show selected tab content
            document.getElementById(tabName + '-content').classList.remove('hidden');

            // Update tab styling - remove active styles from all tabs
            document.querySelectorAll('.tab-link').forEach(link => {
                link.classList.remove('border-blue-500', 'text-blue-600');
                link.classList.add('border-transparent', 'text-gray-500');
            });

            // Add active styles to selected tab
            const activeTab = document.getElementById(tabName + '-tab');
            activeTab.classList.remove('border-transparent', 'text-gray-500');
            activeTab.classList.add('border-blue-500', 'text-blue-600');
        }
    </script>
</body>

</html>
