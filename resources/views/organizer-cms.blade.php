<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Organizer Dashboard</title>
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
                        <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center text-white font-bold">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Event Organizer Dashboard</h1>
                            <p class="text-gray-600">Welcome, {{ $organizerName }}</p>
                        </div>
                    </div>

                    <!-- Header Actions -->
                    <div class="flex items-center space-x-4">
                        <button class="p-2 text-gray-400 hover:text-gray-600 relative">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="absolute -top-1 -right-1 bg-orange-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">2</span>
                        </button>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                {{ strtoupper(substr($organizerName, 0, 1)) }}{{ strtoupper(substr(explode(' ', $organizerName)[1] ?? '', 0, 1)) }}
                            </div>
                            <span class="text-gray-700 font-medium">{{ $organizerName }}</span>
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
                            <button onclick="showTab('dashboard')" id="dashboard-nav" class="nav-item w-full text-left px-4 py-3 rounded-lg bg-green-50 text-green-700 font-medium">
                                <i class="fas fa-chart-line mr-3"></i>My Dashboard
                            </button>
                        </li>
                        <li>
                            <button onclick="showTab('events')" id="events-nav" class="nav-item w-full text-left px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-50 font-medium">
                                <i class="fas fa-calendar-alt mr-3"></i>My Events
                            </button>
                        </li>
                        <li>
                            <button onclick="showTab('create')" id="create-nav" class="nav-item w-full text-left px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-50 font-medium">
                                <i class="fas fa-plus mr-3"></i>Create Event
                            </button>
                        </li>
                        <li>
                            <button onclick="showTab('analytics')" id="analytics-nav" class="nav-item w-full text-left px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-50 font-medium">
                                <i class="fas fa-chart-bar mr-3"></i>My Analytics
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
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">Your Event Overview</h2>
                        <p class="text-gray-600">Here's how your events are performing, {{ $organizerName }}.</p>
                    </div>

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-calendar text-green-600 text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-2xl font-bold text-gray-900">{{ $totalOrganizerEvents }}</h3>
                                    <p class="text-gray-600">Your Events</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-ticket-alt text-orange-600 text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-2xl font-bold text-gray-900">{{ number_format($totalOrganizerTickets) }}</h3>
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
                                    <h3 class="text-2xl font-bold text-gray-900">${{ number_format($totalOrganizerRevenue) }}</h3>
                                    <p class="text-gray-600">Your Revenue</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Events -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">Your Events</h3>
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
                                    @foreach($organizerEvents as $event)
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
                                            {{ number_format($event['tickets_sold']) }}/{{ number_format($event['max_spots']) }}
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
                                            <button type="button" class="text-green-600 hover:text-green-900 mr-3 org-edit-btn" data-id="{{ $event['id'] }}" data-title="{{ $event['title'] }}" data-date="{{ $event['date'] }}" data-time="{{ $event['time'] ?? '' }}" data-location="{{ $event['location'] }}" data-max_spots="{{ $event['max_spots'] }}" data-adress="{{ $event['created_at'] }}" data-description="{{ $event['description'] ?? '' }}">Edit</button>
                                            <form method="POST" class="inline" action="{{ url('/admin/events/'.$event['id']) }}" onsubmit="return confirm('Delete this event?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- My Events Tab -->
                <div id="events-content" class="tab-content hidden">
                    <div class="mb-8 flex justify-between items-center">
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-2">My Events</h2>
                            <p class="text-gray-600">Manage your events - edit details or remove events you no longer want to organize.</p>
                        </div>
                        <button onclick="showTab('create')" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 font-medium">
                            <i class="fas fa-plus mr-2"></i>Create New Event
                        </button>
                    </div>

                    <!-- Events Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        @foreach($organizerEvents as $event)
                        <div class="bg-white border border-gray-200 rounded-lg p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $event['title'] }}</h3>
                                    <p class="text-gray-600 text-sm mb-2">{{ $event['location'] }}</p>
                                    <p class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($event['date'])->format('F j, Y') }}</p>
                                </div>
                                <span class="px-2 py-1 text-xs font-semibold bg-{{ $event['status'] === 'active' ? 'green' : 'red' }}-100 text-{{ $event['status'] === 'active' ? 'green' : 'red' }}-800 rounded-full">
                                    {{ ucfirst(str_replace('_', ' ', $event['status'])) }}
                                </span>
                            </div>

                            <div class="mb-4">
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="text-gray-600">Sales Progress</span>
                                    <span class="text-gray-900 font-medium">{{ number_format($event['tickets_sold']) }}/{{ number_format($event['max_spots']) }}</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-green-600 h-2 rounded-full" style="width: {{ $event['max_spots'] > 0 ? ($event['tickets_sold'] / $event['max_spots']) * 100 : 0 }}%"></div>
                                </div>
                            </div>

                            <div class="flex justify-between items-center mb-4">
                                <span class="text-sm font-medium text-gray-900">Revenue: ${{ number_format($event['revenue']) }}</span>
                                <span class="text-xs text-gray-500">Created {{ \Carbon\Carbon::parse($event['created_at'])->format('M j, Y') }}</span>
                            </div>

                                <div class="flex space-x-3">
                                <button type="button" data-id="{{ $event['id'] }}" data-title="{{ $event['title'] }}" data-date="{{ $event['date'] }}" data-time="{{ $event['time'] ?? '' }}" data-location="{{ $event['location'] }}" data-max_spots="{{ $event['max_spots'] }}" data-adress="{{ $event['created_at'] }}" data-description="{{ $event['description'] ?? '' }}" class="org-edit-btn flex-1 px-3 py-2 text-sm bg-green-100 text-green-700 rounded-lg hover:bg-green-200 font-medium">
                                    <i class="fas fa-edit mr-1"></i>Edit Event
                                </button>
                                <form method="POST" action="{{ url('/admin/events/'.$event['id']) }}" class="flex-1" onsubmit="return confirm('Delete this event?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full px-3 py-2 text-sm bg-red-100 text-red-700 rounded-lg hover:bg-red-200 font-medium">
                                        <i class="fas fa-trash mr-1"></i>Delete Event
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Create Event Tab -->
                <div id="create-content" class="tab-content hidden">
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">Create New Event</h2>
                        <p class="text-gray-600">Fill out the details below to create your new event.</p>
                    </div>

                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 max-w-3xl">
                        <form id="organizer-event-form" method="POST" action="{{ url('/admin/cms') }}" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Event Title *</label>
                                    <input type="text" name="title" id="org-title" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Enter your event title">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Event Date *</label>
                                    <input type="date" name="date" id="org-date" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Event Time *</label>
                                    <input type="time" name="time" id="org-time" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Max Capacity *</label>
                                    <input type="number" name="max_spots" id="org-max_spots" required min="1" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Maximum attendees">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Venue Name *</label>
                                    <input type="text" name="location" id="org-location" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Venue or location name">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Ticket Price ($)</label>
                                    <input type="number" step="0.01" min="0" name="price" id="org-price" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Price per ticket">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Address *</label>
                                <input type="text" name="adress" id="org-adress" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Complete venue address">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Event Description *</label>
                                <textarea name="description" id="org-description" rows="4" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Describe your event, what attendees can expect, any special features..."></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Event Image</label>
                                <input type="file" name="image" id="org-image" accept="image/*" class="w-full text-sm text-gray-600">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Event Category</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                    <option value="">Select a category</option>
                                    <option value="music">Music & Concerts</option>
                                    <option value="art">Art & Culture</option>
                                    <option value="tech">Technology</option>
                                    <option value="sports">Sports</option>
                                    <option value="food">Food & Drink</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                                <p class="text-sm text-gray-500">* Required fields</p>
                                <div class="flex space-x-3">
                                    <button type="button" onclick="showTab('events')" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium">
                                        Cancel
                                    </button>
                                    <button id="org-form-submit" type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 font-medium">
                                        <i class="fas fa-plus mr-2"></i><span id="org-submit-label">Create Event</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Analytics Tab -->
                <div id="analytics-content" class="tab-content hidden">
                    <div class="mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">Your Event Analytics</h2>
                        <p class="text-gray-600">Performance insights for your events.</p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Performance Summary -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Performance Summary</h3>
                            <div class="space-y-4">
                                @foreach($organizerEvents as $index => $event)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div>
                                        <h4 class="font-medium text-gray-900">{{ $event['title'] }}</h4>
                                        <p class="text-sm text-gray-600">${{ number_format($event['revenue']) }} revenue</p>
                                        <p class="text-sm text-gray-500">{{ number_format($event['max_spots'] > 0 ? ($event['tickets_sold'] / $event['max_spots']) * 100 : 0, 1) }}% sold</p>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-lg font-bold text-green-600">#{{ $index + 1 }}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Revenue Breakdown -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Revenue Breakdown</h3>
                            <div class="h-64 bg-gray-100 rounded-lg flex items-center justify-center">
                                <div class="text-center text-gray-500">
                                    <i class="fas fa-chart-pie text-4xl mb-4"></i>
                                    <p>Revenue chart would be displayed here</p>
                                    <p class="text-sm">(Chart.js integration recommended)</p>
                                </div>
                            </div>
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
                item.classList.remove('bg-green-50', 'text-green-700');
                item.classList.add('text-gray-700', 'hover:bg-gray-50');
            });

            // Add active styles to selected nav item
            const activeNav = document.getElementById(tabName + '-nav');
            activeNav.classList.remove('text-gray-700', 'hover:bg-gray-50');
            activeNav.classList.add('bg-green-50', 'text-green-700');
        }

        function confirmDelete(eventTitle) {
            if (confirm(`Are you sure you want to delete "${eventTitle}"? This action cannot be undone.`)) {
                // In production, this would make an AJAX call to delete the event
                alert('Event would be deleted (backend integration needed)');
            }
        }

        // Organizer edit form wiring
        (function(){
            const editBtns = document.querySelectorAll('.org-edit-btn');
            const form = document.getElementById('organizer-event-form');
            const submitLabel = document.getElementById('org-submit-label');
            const cancelNav = document.querySelector('#create-nav');

            function setCreateMode(){
                form.reset();
                form.action = "{{ url('/admin/cms') }}";
                const methodInput = form.querySelector('input[name="_method"]');
                if(methodInput) methodInput.remove();
                if(submitLabel) submitLabel.textContent = 'Create Event';
            }

            function setEditMode(data){
                form.action = '/admin/events/' + data.id;
                let methodInput = form.querySelector('input[name="_method"]');
                if(!methodInput){
                    methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    form.appendChild(methodInput);
                }
                methodInput.value = 'PUT';

                // fill inputs
                document.getElementById('org-title').value = data.title || '';
                document.getElementById('org-date').value = data.date || '';
                if(document.getElementById('org-time')) document.getElementById('org-time').value = data.time || '';
                document.getElementById('org-location').value = data.location || '';
                document.getElementById('org-max_spots').value = data.max_spots || '';
                document.getElementById('org-adress').value = data.adress || '';
                if(document.getElementById('org-description')) document.getElementById('org-description').value = data.description || '';
                if(document.getElementById('org-price')) document.getElementById('org-price').value = data.price || '';

                if(submitLabel) submitLabel.textContent = 'Save Changes';
                // show create tab
                showTab('create');
            }

            editBtns.forEach(btn => {
                btn.addEventListener('click', function(){
                    const data = {
                        id: btn.dataset.id,
                        title: btn.dataset.title,
                        date: btn.dataset.date,
                        time: btn.dataset.time,
                        location: btn.dataset.location,
                        max_spots: btn.dataset.max_spots,
                        adress: btn.dataset.adress,
                        description: btn.dataset.description,
                    };
                    setEditMode(data);
                });
            });

            // reset to create on page load
            setCreateMode();
        })();
    </script>
</body>

</html>