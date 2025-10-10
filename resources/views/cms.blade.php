<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Manager CMS - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/app.css'])
    @stack('styles')
</head>

<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <!-- Logo and Title -->
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Event Manager CMS</h1>
                            <p class="text-gray-600">Admin Dashboard</p>
                        </div>
                    </div>

                    <!-- Header Actions -->
                    <div class="flex items-center space-x-4">
                        <button class="p-2 text-gray-400 hover:text-gray-600 relative">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                        </button>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                AD
                            </div>
                            <span class="text-gray-700 font-medium">Admin</span>
                        </div>
                        <a href="{{ route('account') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 border border-gray-300 rounded-lg">
                            User View
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex">
            <!-- Sidebar -->
            <aside class="w-64 bg-white shadow-sm min-h-screen border-r border-gray-200">
                <nav class="p-6">
                    <ul class="space-y-2">
                        <li>
                            <button onclick="showTab('dashboard')" id="dashboard-nav" class="nav-item w-full text-left px-4 py-3 rounded-lg bg-blue-50 text-blue-700 font-medium">
                                <i class="fas fa-chart-line mr-3"></i>Dashboard
                            </button>
                        </li>
                        <li>
                            <button onclick="showTab('events')" id="events-nav" class="nav-item w-full text-left px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-50 font-medium">
                                <i class="fas fa-calendar-alt mr-3"></i>Event Management
                            </button>
                        </li>
                        <li>
                            <button onclick="showTab('users')" id="users-nav" class="nav-item w-full text-left px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-50 font-medium">
                                <i class="fas fa-users mr-3"></i>User Management
                            </button>
                        </li>
                        <li>
                            <button onclick="showTab('analytics')" id="analytics-nav" class="nav-item w-full text-left px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-50 font-medium">
                                <i class="fas fa-chart-bar mr-3"></i>Analytics
                            </button>
                        </li>
                        <li>
                            <button onclick="showTab('settings')" id="settings-nav" class="nav-item w-full text-left px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-50 font-medium">
                                <i class="fas fa-cog mr-3"></i>Settings
                            </button>
                        </li>
                    </ul>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-8">
                <!-- Dashboard Tab -->
                <div id="dashboard-content" class="tab-content">
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">Dashboard Overview</h2>
                        <p class="text-gray-600">Welcome to the Event Manager CMS. Here's your current statistics.</p>
                    </div>

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-calendar text-blue-600 text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-2xl font-bold text-gray-900">{{ $totalEvents }}</h3>
                                    <p class="text-gray-600">Total Events</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-users text-green-600 text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-2xl font-bold text-gray-900">{{ number_format($totalUsers) }}</h3>
                                    <p class="text-gray-600">Registered Users</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-ticket-alt text-orange-600 text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-2xl font-bold text-gray-900">{{ number_format($totalTicketsSold) }}</h3>
                                    <p class="text-gray-600">Tickets Sold</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-dollar-sign text-purple-600 text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-2xl font-bold text-gray-900">${{ number_format($totalRevenue) }}</h3>
                                    <p class="text-gray-600">Total Revenue</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Events -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">Recent Events</h3>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sales</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Revenue</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($recentEvents as $event)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">{{ $event['title'] }}</div>
                                                <div class="text-sm text-gray-500">{{ $event['location'] }}</div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ \Carbon\Carbon::parse($event['date'])->format('M j, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ number_format($event['tickets_sold']) }}/{{ number_format($event['capacity']) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            ${{ number_format($event['revenue']) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($event['status'] === 'active')
                                                <span class="px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">Active</span>
                                            @elseif($event['status'] === 'sold_out')
                                                <span class="px-2 py-1 text-xs font-semibold bg-red-100 text-red-800 rounded-full">Sold Out</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                                            <button class="text-red-600 hover:text-red-900">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Event Management Tab -->
                <div id="events-content" class="tab-content hidden">
                    <div class="mb-8 flex justify-between items-center">
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-2">Event Management</h2>
                            <p class="text-gray-600">Create, edit, and manage your events.</p>
                        </div>
                        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium">
                            <i class="fas fa-plus mr-2"></i>Create New Event
                        </button>
                    </div>

                    <!-- Event Creation Form -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Create New Event</h3>
                        <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Event Title</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter event title">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Event Date</label>
                                <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Event location">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Max Capacity</label>
                                <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Maximum attendees">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Event description"></textarea>
                            </div>
                            <div class="md:col-span-2 flex justify-end">
                                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium">
                                    Create Event
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Events List -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">All Events</h3>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                @foreach($recentEvents as $event)
                                <div class="border border-gray-200 rounded-lg p-4">
                                    <div class="flex justify-between items-start mb-3">
                                        <h4 class="font-semibold text-gray-900">{{ $event['title'] }}</h4>
                                        <span class="px-2 py-1 text-xs font-semibold bg-{{ $event['status'] === 'active' ? 'green' : 'red' }}-100 text-{{ $event['status'] === 'active' ? 'green' : 'red' }}-800 rounded-full">
                                            {{ ucfirst(str_replace('_', ' ', $event['status'])) }}
                                        </span>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-2">{{ $event['location'] }}</p>
                                    <p class="text-sm text-gray-600 mb-4">{{ \Carbon\Carbon::parse($event['date'])->format('F j, Y') }}</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm font-medium text-gray-900">${{ number_format($event['revenue']) }} revenue</span>
                                        <div class="flex space-x-2">
                                            <button class="px-3 py-1 text-sm bg-blue-100 text-blue-700 rounded hover:bg-blue-200">Edit</button>
                                            <button class="px-3 py-1 text-sm bg-red-100 text-red-700 rounded hover:bg-red-200">Delete</button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Management Tab -->
                <div id="users-content" class="tab-content hidden">
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">User Management</h2>
                        <p class="text-gray-600">Manage registered users and their permissions.</p>
                    </div>

                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-900">Registered Users</h3>
                            <div class="flex items-center space-x-4">
                                <input type="text" placeholder="Search users..." class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium">
                                    <i class="fas fa-plus mr-2"></i>Add User
                                </button>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Registration Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Events Attended</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold">JD</div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">John Doe</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">john.doe@example.com</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Jan 15, 2022</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">24</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">Active</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                                            <button class="text-red-600 hover:text-red-900">Suspend</button>
                                        </td>
                                    </tr>
                                    <!-- More user rows would go here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Analytics Tab -->
                <div id="analytics-content" class="tab-content hidden">
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">Analytics & Reports</h2>
                        <p class="text-gray-600">Detailed insights and performance metrics.</p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Revenue Chart Placeholder -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Revenue Over Time</h3>
                            <div class="h-64 bg-gray-100 rounded-lg flex items-center justify-center">
                                <div class="text-center text-gray-500">
                                    <i class="fas fa-chart-line text-4xl mb-4"></i>
                                    <p>Revenue chart would be displayed here</p>
                                    <p class="text-sm">(Integration with Chart.js recommended)</p>
                                </div>
                            </div>
                        </div>

                        <!-- Event Performance -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Top Performing Events</h3>
                            <div class="space-y-4">
                                @foreach($recentEvents as $index => $event)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div>
                                        <h4 class="font-medium text-gray-900">{{ $event['title'] }}</h4>
                                        <p class="text-sm text-gray-600">${{ number_format($event['revenue']) }} revenue</p>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-lg font-bold text-gray-900">#{{ $index + 1 }}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Settings Tab -->
                <div id="settings-content" class="tab-content hidden">
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">CMS Settings</h2>
                        <p class="text-gray-600">Configure your event management system.</p>
                    </div>

                    <div class="max-w-2xl">
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">General Settings</h3>
                            <form class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Site Name</label>
                                    <input type="text" value="Event Manager" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Contact Email</label>
                                    <input type="email" value="admin@eventmanager.com" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Default Event Capacity</label>
                                    <input type="number" value="1000" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium">
                                        Save Settings
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function showTab(tabName) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });

            // Show selected tab content
            document.getElementById(tabName + '-content').classList.remove('hidden');

            // Update navigation styling
            document.querySelectorAll('.nav-item').forEach(item => {
                item.classList.remove('bg-blue-50', 'text-blue-700');
                item.classList.add('text-gray-700', 'hover:bg-gray-50');
            });

            // Add active styles to selected nav item
            const activeNav = document.getElementById(tabName + '-nav');
            activeNav.classList.remove('text-gray-700', 'hover:bg-gray-50');
            activeNav.classList.add('bg-blue-50', 'text-blue-700');
        }
    </script>
</body>

</html>
