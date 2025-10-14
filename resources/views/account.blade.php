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

<body class="bg-black text-white">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="border-b border-white/10 bg-black">
            <div class="max-w-7xl mx-auto px-6 md:px-8">
                <div class="flex justify-between items-center py-6">
                    <!-- User Profile Section -->
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-xl font-bold">
                            {{ strtoupper(substr(auth()->user()->name ?? auth()->user()->email, 0, 2)) }}
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold">{{ auth()->user()->name ?? 'User' }}</h1>
                            <p class="text-gray-400">{{ auth()->user()->email }}</p>
                            <p class="text-sm text-gray-500">Member since {{ auth()->user()->created_at->format('F Y') }}</p>
                        </div>
                    </div>

                    <!-- Header Actions -->
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('organizer.cms') }}" class="px-4 py-2 text-sm font-medium bg-white/5 hover:bg-white/10 rounded-full border border-white/10 hover:border-white/20 transition-all duration-200 flex items-center">
                            <i class="fas fa-user-tie mr-2"></i>Organizer
                        </a>
                        <a href="{{ route('admin.cms') }}" class="px-4 py-2 text-sm font-medium bg-white text-black rounded-full hover:bg-gray-200 transition-all duration-200 flex items-center font-semibold">
                            <i class="fas fa-tools mr-2"></i>Admin CMS
                        </a>
                        <button onclick="switchTab('settings')" class="p-2 text-gray-400 hover:text-white transition-all duration-200">
                            <i class="fas fa-cog w-5 h-5"></i>
                        </button>
                        <button class="px-4 py-2 text-sm font-medium text-gray-400 hover:text-white transition-all duration-200">
                            Sign Out
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-6 md:px-8 py-12">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
                <!-- Upcoming Events Card -->
                <div class="bg-white/5 rounded-2xl p-6 border border-white/10 hover:border-white/20 transition-all duration-300">
                    <div class="flex items-center">
                        <div class="w-14 h-14 bg-blue-500/20 rounded-xl flex items-center justify-center border border-blue-500/30">
                            <i class="fas fa-calendar-alt text-blue-400 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-3xl font-bold">{{ count($upcomingEvents) }}</h3>
                            <p class="text-gray-400">Upcoming Events</p>
                        </div>
                    </div>
                </div>

                <!-- Total Tickets Card -->
                <div class="bg-white/5 rounded-2xl p-6 border border-white/10 hover:border-white/20 transition-all duration-300">
                    <div class="flex items-center">
                        <div class="w-14 h-14 bg-green-500/20 rounded-xl flex items-center justify-center border border-green-500/30">
                            <i class="fas fa-ticket-alt text-green-400 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-3xl font-bold">{{ $totalTickets }}</h3>
                            <p class="text-gray-400">Total Tickets</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Tabs -->
            <div class="bg-white/5 rounded-2xl border border-white/10 mb-8">
                <div class="border-b border-white/10">
                    <nav class="flex space-x-8 px-6">
                        <button onclick="switchTab('tickets')" id="tickets-tab" class="tab-link py-4 px-1 border-b-2 border-blue-500 text-blue-400 font-medium text-sm">
                            My Tickets
                        </button>
                        <button onclick="switchTab('settings')" id="settings-tab" class="tab-link py-4 px-1 border-b-2 border-transparent text-gray-400 hover:text-white hover:border-white/20 font-medium text-sm transition-all duration-200">
                            Account Settings
                        </button>
                    </nav>
                </div>

                <!-- My Tickets Tab Content -->
                <div id="tickets-content" class="tab-content p-6">
                    <h2 class="text-xl font-bold mb-6">Upcoming Events</h2>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        @foreach($upcomingEvents as $event)
                        <!-- {{ $event['title'] }} Event Card -->
                        <div class="flex bg-white/5 rounded-xl p-4 border border-white/10 hover:border-white/20 transition-all duration-300">
                            <div class="w-24 h-24 {{ $event['color'] }} rounded-lg flex-shrink-0 mr-4 relative overflow-hidden">
                                <div class="w-full h-full flex items-center justify-center text-white">
                                    <i class="{{ $event['icon'] }} text-2xl"></i>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-semibold">{{ $event['title'] }}</h3>
                                    <span class="bg-orange-500/20 text-orange-400 text-xs px-2 py-1 rounded-full border border-orange-500/30">{{ $event['user_tickets'] }} {{ $event['user_tickets'] == 1 ? 'ticket' : 'tickets' }}</span>
                                </div>
                                <div class="text-sm text-gray-400 space-y-1">
                                    <p><i class="far fa-calendar mr-2"></i>{{ \Carbon\Carbon::parse($event['date'])->format('M j, Y') }}</p>
                                    <p><i class="far fa-clock mr-2"></i>{{ \Carbon\Carbon::parse($event['time'])->format('g:i A') }}</p>
                                    <p><i class="fas fa-map-marker-alt mr-2"></i>{{ $event['location'] }}</p>
                                    <p><i class="fas fa-map-pin mr-2"></i>{{ $event['address'] }}</p>
                                    <p class="font-medium text-gray-300">{{ $event['description'] }}</p>
                                </div>
                                <div class="flex justify-between items-center mt-4">
                                    <div class="text-xs text-blue-400 font-medium">
                                        You own {{ $event['user_tickets'] }} {{ $event['user_tickets'] == 1 ? 'ticket' : 'tickets' }} for this event
                                    </div>
                                    <div class="flex space-x-3">
                                        <button class="flex items-center px-3 py-2 text-sm bg-white/5 text-gray-300 rounded-lg hover:bg-white/10 border border-white/10 hover:border-white/20 transition-all duration-200">
                                            <i class="fas fa-download mr-2"></i>Download
                                        </button>
                                        <button class="px-3 py-2 text-sm bg-white text-black rounded-lg hover:bg-gray-200 transition-all duration-200 font-semibold">
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
                    <h2 class="text-xl font-bold mb-6">Account Settings</h2>

                    <!-- Success Message -->
                    @if(session('success'))
                    <div class="mb-6 bg-green-500/20 border border-green-500/30 rounded-xl p-4 text-green-400">
                        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                    </div>
                    @endif

                    <div class="max-w-2xl">
                        <!-- Profile Information Section -->
                        <div class="bg-white/5 rounded-xl p-6 mb-8 border border-white/10">
                            <h3 class="text-lg font-semibold mb-4">Profile Information</h3>
                            
                            @if($errors->any() && !$errors->has('current_password') && !$errors->has('new_password'))
                            <div class="mb-4 bg-red-500/20 border border-red-500/30 rounded-lg p-3 text-red-400 text-sm">
                                <ul class="list-disc list-inside">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <form action="{{ route('account.profile.update') }}" method="POST" class="space-y-4">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="first_name" class="block text-sm font-medium text-gray-300 mb-2">First Name</label>
                                        <input type="text" id="first_name" name="first_name" value="{{ old('first_name', explode(' ', auth()->user()->name ?? '')[0] ?? '') }}" required class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white">
                                    </div>
                                    <div>
                                        <label for="last_name" class="block text-sm font-medium text-gray-300 mb-2">Last Name</label>
                                        <input type="text" id="last_name" name="last_name" value="{{ old('last_name', explode(' ', auth()->user()->name ?? '')[1] ?? '') }}" required class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white">
                                    </div>
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                                    <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white">
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 transition-all duration-200">
                                        Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Password Change Section -->
                        <div class="bg-white/5 rounded-xl p-6 mb-8 border border-white/10">
                            <h3 class="text-lg font-semibold mb-4">Change Password</h3>
                            
                            @if($errors->has('current_password') || $errors->has('new_password'))
                            <div class="mb-4 bg-red-500/20 border border-red-500/30 rounded-lg p-3 text-red-400 text-sm">
                                <ul class="list-disc list-inside">
                                    @if($errors->has('current_password'))
                                    <li>{{ $errors->first('current_password') }}</li>
                                    @endif
                                    @if($errors->has('new_password'))
                                    <li>{{ $errors->first('new_password') }}</li>
                                    @endif
                                </ul>
                            </div>
                            @endif

                            <form action="{{ route('account.password.update') }}" method="POST" class="space-y-4">
                                @csrf
                                <div>
                                    <label for="current_password" class="block text-sm font-medium text-gray-300 mb-2">Current Password</label>
                                    <input type="password" id="current_password" name="current_password" required class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white">
                                </div>
                                <div>
                                    <label for="new_password" class="block text-sm font-medium text-gray-300 mb-2">New Password</label>
                                    <input type="password" id="new_password" name="new_password" required class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white">
                                    <p class="text-xs text-gray-400 mt-1">Minimum 8 characters</p>
                                </div>
                                <div>
                                    <label for="new_password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">Confirm New Password</label>
                                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" required class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white">
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 transition-all duration-200">
                                        Update Password
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Notification Preferences -->
                        <div class="bg-white/5 rounded-xl p-6 mb-8 border border-white/10">
                            <h3 class="text-lg font-semibold mb-4">Notification Preferences</h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium">Email Notifications</h4>
                                        <p class="text-sm text-gray-400">Receive notifications about events and updates via email</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-white/10 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-500/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    </label>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium">SMS Notifications</h4>
                                        <p class="text-sm text-gray-400">Receive text message alerts for important updates</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer">
                                        <div class="w-11 h-6 bg-white/10 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-500/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    </label>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium">Event Reminders</h4>
                                        <p class="text-sm text-gray-400">Get reminded about upcoming events you're attending</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-white/10 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-500/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Danger Zone -->
                        <div class="bg-red-500/10 border border-red-500/30 rounded-xl p-6">
                            <h3 class="text-lg font-semibold text-red-400 mb-4">Danger Zone</h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium text-red-400">Delete Account</h4>
                                        <p class="text-sm text-red-300/80">Permanently delete your account and all associated data</p>
                                    </div>
                                    <button onclick="confirmDelete()" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:ring-2 focus:ring-red-500 transition-all duration-200">
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
                link.classList.remove('border-blue-500', 'text-blue-400');
                link.classList.add('border-transparent', 'text-gray-400');
            });

            // Add active styles to selected tab
            const activeTab = document.getElementById(tabName + '-tab');
            activeTab.classList.remove('border-transparent', 'text-gray-400');
            activeTab.classList.add('border-blue-500', 'text-blue-400');
        }

        function confirmDelete() {
            if (confirm('Are you sure you want to delete your account? This action cannot be undone.')) {
                const password = prompt('Please enter your password to confirm:');
                if (password) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '{{ route("account.delete") }}';
                    
                    const csrfToken = document.createElement('input');
                    csrfToken.type = 'hidden';
                    csrfToken.name = '_token';
                    csrfToken.value = '{{ csrf_token() }}';
                    
                    const methodField = document.createElement('input');
                    methodField.type = 'hidden';
                    methodField.name = '_method';
                    methodField.value = 'DELETE';
                    
                    const passwordField = document.createElement('input');
                    passwordField.type = 'hidden';
                    passwordField.name = 'password';
                    passwordField.value = password;
                    
                    form.appendChild(csrfToken);
                    form.appendChild(methodField);
                    form.appendChild(passwordField);
                    document.body.appendChild(form);
                    form.submit();
                }
            }
        }

        // Check if there are errors and switch to settings tab
        @if($errors->any())
        document.addEventListener('DOMContentLoaded', function() {
            switchTab('settings');
        });
        @endif

        // Check for success message and switch to settings tab
        @if(session('success'))
        document.addEventListener('DOMContentLoaded', function() {
            switchTab('settings');
        });
        @endif
    </script>
</body>

</html>
    </script>
</body>

</html>
