@extends('layouts.app')

@section('title', 'My Account')

@section('content')
<div class="min-h-screen bg-black text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <!-- Tab Navigation -->
        <div class="flex gap-2 sm:gap-3 mb-8 overflow-x-auto pb-2 scrollbar-hide">
            <button onclick="showTab('profile')" id="tab-profile" class="px-4 sm:px-6 py-2 sm:py-3 bg-white text-black rounded-full text-sm font-semibold whitespace-nowrap">Profile</button>
            <button onclick="showTab('tickets')" id="tab-tickets" class="px-4 sm:px-6 py-2 sm:py-3 bg-white/5 rounded-full text-sm border border-white/10 whitespace-nowrap">My Tickets</button>
            <button onclick="showTab('settings')" id="tab-settings" class="px-4 sm:px-6 py-2 sm:py-3 bg-white/5 rounded-full text-sm border border-white/10 whitespace-nowrap">Settings</button>
        </div>

        <!-- Profile Tab -->
        <div id="content-profile">
            <div class="grid lg:grid-cols-3 gap-6 sm:gap-8">
                <!-- Profile Card -->
                <div class="lg:col-span-1">
                    <div class="bg-white/5 rounded-2xl p-6 border border-white/10 sticky top-24">
                        <div class="flex flex-col items-center text-center">
                            <!-- Avatar -->
                            <div class="w-24 h-24 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-3xl font-bold mb-4">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </div>
                            <h2 class="text-2xl font-bold mb-1">{{ $user->name }}</h2>
                            <p class="text-gray-400 text-sm mb-4">{{ $user->email }}</p>
                            <div class="w-full space-y-2">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Member Since</span>
                                    <span class="font-semibold">{{ $memberSince }}</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Total Tickets</span>
                                    <span class="font-semibold">{{ $totalTickets }}</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Events Attended</span>
                                    <span class="font-semibold">{{ $eventsAttended }}</span>
                                </div>
                            </div>
                            <button onclick="showEditProfile()" class="w-full mt-6 px-6 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition">
                                Edit Profile
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Profile Details -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Edit Profile Form (Hidden by default) -->
                    <div id="editProfileForm" class="bg-white/5 rounded-2xl p-6 border border-white/10 hidden">
                        <h3 class="text-xl font-bold mb-6">Edit Profile</h3>
                        <form onsubmit="handleProfileUpdate(event)" class="space-y-4">
                            <div>
                                <label class="block text-sm text-gray-400 mb-2">Full Name</label>
                                <input type="text" id="fullName" value="{{ $user->name }}" required class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 text-white">
                            </div>
                            <div>
                                <label class="block text-sm text-gray-400 mb-2">Email</label>
                                <input type="email" id="email" value="{{ $user->email }}" required class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 text-white">
                            </div>
                            <div>
                                <label class="block text-sm text-gray-400 mb-2">Phone Number</label>
                                <input type="tel" id="phone" value="" placeholder="+1 (555) 123-4567" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 text-white">
                            </div>
                            <div class="flex gap-3">
                                <button type="submit" class="px-6 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200">Save Changes</button>
                                <button type="button" onclick="hideEditProfile()" class="px-6 py-3 border border-white/20 rounded-full hover:bg-white/5">Cancel</button>
                            </div>
                        </form>
                    </div>

                    <!-- Recent Activity -->
                    <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                        <h3 class="text-xl font-bold mb-6">Recent Activity</h3>
                        <div class="space-y-4">
                            <div class="flex items-start gap-4 pb-4 border-b border-white/10">
                                <div class="w-12 h-12 bg-green-500/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium">Ticket purchased</p>
                                    <p class="text-sm text-gray-400">Summer Music Festival - 2 tickets</p>
                                    <p class="text-xs text-gray-500 mt-1">2 days ago</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4 pb-4 border-b border-white/10">
                                <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium">Added to favorites</p>
                                    <p class="text-sm text-gray-400">Comedy Night Live</p>
                                    <p class="text-xs text-gray-500 mt-1">5 days ago</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-blue-500/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium">Profile updated</p>
                                    <p class="text-sm text-gray-400">Changed profile information</p>
                                    <p class="text-xs text-gray-500 mt-1">1 week ago</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="grid sm:grid-cols-3 gap-4">
                        <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                            <div class="text-sm text-gray-400 mb-2">Total Spent</div>
                            <div class="text-2xl font-bold">${{ number_format($totalSpent) }}</div>
                        </div>
                        <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                            <div class="text-sm text-gray-400 mb-2">Upcoming Events</div>
                            <div class="text-2xl font-bold">{{ $upcomingEventsCount }}</div>
                        </div>
                        <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                            <div class="text-sm text-gray-400 mb-2">Total Tickets</div>
                            <div class="text-2xl font-bold">{{ $totalTickets }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- My Tickets Tab -->
        <div id="content-tickets" class="hidden">
            <div class="mb-6">
                <h2 class="text-2xl font-bold mb-2">My Tickets</h2>
                <p class="text-gray-400">View and manage your event tickets</p>
            </div>

            <!-- Upcoming Tickets -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4">Upcoming Events</h3>
                @if(count($upcomingTickets) > 0)
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($upcomingTickets as $ticket)
                            <!-- Ticket Card -->
                            <div class="bg-white/5 rounded-2xl border border-white/10 overflow-hidden hover:border-white/20 transition">
                                <div class="h-40 bg-gradient-to-br from-purple-500/20 to-pink-500/20 flex items-center justify-center">
                                    <div class="text-center">
                                        <div class="text-6xl font-bold mb-2">{{ explode(' ', $ticket['date'])[1] }}</div>
                                        <div class="text-sm text-gray-400">{{ explode(' ', $ticket['date'])[0] }} {{ explode(' ', $ticket['date'])[2] }}</div>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h4 class="font-bold text-lg mb-2">{{ $ticket['event_title'] }}</h4>
                                    <div class="space-y-2 text-sm text-gray-400 mb-4">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            <span>{{ $ticket['location'] }}</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <span>{{ $ticket['time'] }}</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                                            </svg>
                                            <span>{{ $ticket['tickets_count'] }} {{ $ticket['tickets_count'] == 1 ? 'Ticket' : 'Tickets' }}</span>
                                        </div>
                                    </div>
                                    <button onclick="viewTicket('{{ $ticket['ticket_id'] }}')" class="w-full px-4 py-2 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition">
                                        View Tickets
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-white/5 rounded-2xl p-12 border border-white/10 text-center">
                        <p class="text-gray-400">No upcoming events. Browse events to book tickets!</p>
                        <a href="{{ route('homepage') }}" class="inline-block mt-4 px-6 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition">
                            Browse Events
                        </a>
                    </div>
                @endif
            </div>

            <!-- Past Events -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Past Events</h3>
                @if(count($pastEvents) > 0)
                    <div class="space-y-4">
                        @foreach($pastEvents as $event)
                            <div class="bg-white/5 rounded-2xl p-4 border border-white/10 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                <div class="flex-1">
                                    <h4 class="font-bold mb-1">{{ $event['event_title'] }}</h4>
                                    <div class="text-sm text-gray-400">{{ $event['date'] }} • {{ $event['location'] }}</div>
                                </div>
                                <span class="px-3 py-1 bg-gray-500/20 text-gray-400 rounded-full text-xs font-semibold">Attended</span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-white/5 rounded-2xl p-8 border border-white/10 text-center">
                        <p class="text-gray-400">No past events yet.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Settings Tab -->
        <div id="content-settings" class="hidden">
            <div class="mb-6">
                <h2 class="text-2xl font-bold mb-2">Account Settings</h2>
                <p class="text-gray-400">Manage your account preferences</p>
            </div>

            <div class="max-w-3xl space-y-6">
                <!-- Password -->
                <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                    <h3 class="text-lg font-bold mb-4">Change Password</h3>
                    <form onsubmit="handlePasswordChange(event)" class="space-y-4">
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Current Password</label>
                            <input type="password" id="currentPassword" required class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 text-white">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">New Password</label>
                            <input type="password" id="newPassword" required class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 text-white">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Confirm New Password</label>
                            <input type="password" id="confirmPassword" required class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20 text-white">
                        </div>
                        <button type="submit" class="px-6 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200">
                            Update Password
                        </button>
                    </form>
                </div>

                <!-- Danger Zone -->
                <div class="bg-red-500/10 rounded-2xl p-6 border border-red-500/20">
                    <h3 class="text-lg font-bold mb-2 text-red-400">Danger Zone</h3>
                    <p class="text-sm text-gray-400 mb-4">Once you delete your account, there is no going back. Please be certain.</p>
                    <button onclick="confirmDelete()" class="px-6 py-3 bg-red-500/20 text-red-400 border border-red-500/30 rounded-full font-semibold hover:bg-red-500/30 transition">
                        Delete Account
                    </button>
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
    // Tab switching
    function showTab(tab) {
        document.querySelectorAll('[id^="content-"]').forEach(el => el.classList.add('hidden'));
        document.getElementById('content-' + tab).classList.remove('hidden');
        document.querySelectorAll('[id^="tab-"]').forEach(btn => {
            btn.classList.remove('bg-white', 'text-black', 'font-semibold');
            btn.classList.add('bg-white/5', 'border', 'border-white/10');
        });
        document.getElementById('tab-' + tab).classList.remove('bg-white/5', 'border', 'border-white/10');
        document.getElementById('tab-' + tab).classList.add('bg-white', 'text-black', 'font-semibold');
    }

    // Show/Hide Edit Profile Form
    function showEditProfile() {
        document.getElementById('editProfileForm').classList.remove('hidden');
        document.getElementById('editProfileForm').scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    function hideEditProfile() {
        document.getElementById('editProfileForm').classList.add('hidden');
    }

    // Handle Profile Update
    function handleProfileUpdate(e) {
        e.preventDefault();
        const fullName = document.getElementById('fullName').value;
        const email = document.getElementById('email').value;
        
        alert('✅ Profile Updated Successfully!\n\n' +
              'Name: ' + fullName + '\n' +
              'Email: ' + email + '\n\n' +
              'This will be connected to the database later.');
        
        hideEditProfile();
    }

    // View Ticket
    function viewTicket(ticketId) {
        alert('Opening ticket: ' + ticketId + '\n\nTicket details and QR code would be displayed here.');
    }

    // Handle Password Change
    function handlePasswordChange(e) {
        e.preventDefault();
        const newPassword = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        
        if (newPassword !== confirmPassword) {
            alert('❌ Passwords do not match!');
            return;
        }
        
        alert('✅ Password Changed Successfully!\n\nThis will be connected to the database later.');
        e.target.reset();
    }

    // Confirm Delete Account
    function confirmDelete() {
        if (confirm('⚠️ Are you sure you want to delete your account?\n\nThis action cannot be undone!')) {
            alert('Account deletion would be processed here.');
        }
    }

    // Initialize profile tab on load
    document.addEventListener('DOMContentLoaded', function() {
        // Check for tab parameter in URL
        const urlParams = new URLSearchParams(window.location.search);
        const tabParam = urlParams.get('tab');
        
        if (tabParam && ['profile', 'tickets', 'settings'].includes(tabParam)) {
            showTab(tabParam);
        } else {
            showTab('profile');
        }
    });

    // Function to handle tab switching from URL
    function showTabFromUrl(tabName) {
        if (window.location.pathname.includes('account-design')) {
            setTimeout(() => {
                showTab(tabName);
            }, 100);
        }
    }
</script>
@endsection
