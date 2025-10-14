<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black text-white min-h-screen">

    <div class="border-b border-white/10">
        <div class="max-w-7xl mx-auto px-6 py-6">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold mb-1">Admin Dashboard</h1>
                    <p class="text-gray-400">Manage your events and platform</p>
                </div>
                <a href="/"
                    class="px-4 py-2 border border-white/20 rounded-full text-sm hover:bg-white/5 transition">Back to
                    Site</a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                <div class="text-sm text-gray-400 mb-2">Total Events</div>
                <div class="text-3xl font-bold">{{ $totalEvents }}</div>
            </div>
            <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                <div class="text-sm text-gray-400 mb-2">Total Users</div>
                <div class="text-3xl font-bold">{{ $totalUsers }}</div>
            </div>
            <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                <div class="text-sm text-gray-400 mb-2">Tickets Sold</div>
                <div class="text-3xl font-bold">{{ $totalTicketsSold }}</div>
            </div>
            <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                <div class="text-sm text-gray-400 mb-2">Revenue</div>
                <div class="text-3xl font-bold">${{ $totalRevenue }}</div>
            </div>
        </div>

        <div class="flex gap-3 mb-8 overflow-x-auto">
            <button onclick="showTab('events')" id="tab-events"
                class="px-6 py-3 bg-white text-black rounded-full text-sm font-semibold">Events</button>
            <button onclick="showTab('users')" id="tab-users"
                class="px-6 py-3 bg-white/5 rounded-full text-sm border border-white/10">Users</button>
            <button onclick="showTab('analytics')" id="tab-analytics"
                class="px-6 py-3 bg-white/5 rounded-full text-sm border border-white/10">Analytics</button>
            <button onclick="showTab('settings')" id="tab-settings"
                class="px-6 py-3 bg-white/5 rounded-full text-sm border border-white/10">Settings</button>
        </div>

        <div id="content-events">
            <div class="mb-6 flex justify-between items-center">
                <h2 class="text-2xl font-bold">Events</h2>
                <button onclick="toggleForm()"
                    class="px-6 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition">+
                    Create Event</button>
            </div>

            <div id="eventForm" class="bg-white/5 rounded-2xl p-6 border border-white/10 mb-6 hidden">
                <h3 id="event-form-heading" class="text-xl font-semibold mb-4">Create New Event</h3>
                <form id="event-form" method="POST" action="{{ url('/admin/cms') }}" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Event Title</label>
                            <input type="text" id="title" name="title" required
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Date</label>
                            <input type="date" id="date" name="date" required
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Time</label>
                            <input type="time" id="time" name="time" required
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Location</label>
                            <input type="text" id="location" name="location" required
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Address</label>
                            <input type="text" id="adress" name="adress" required
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Capacity</label>
                            <input type="number" id="max_spots" name="max_spots" required
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm text-gray-400 mb-2">Description</label>
                            <textarea id="description" name="description" rows="4"
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Image</label>
                            <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-300" />
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <button id="event-form-submit" type="submit"
                            class="px-8 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200">Create</button>
                        <button id="event-form-cancel" type="button" onclick="toggleForm()"
                            class="px-8 py-3 border border-white/20 rounded-full hover:bg-white/5">Cancel</button>
                    </div>
                </form>
            </div>

            <div class="space-y-4">
                @foreach($recentEvents as $event)
                    <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-bold">{{ $event['title'] }}</h3>
                                <p class="text-gray-400 text-sm">{{ $event['location'] }}</p>
                                <p class="text-gray-500 text-sm">{{ $event['date'] }}</p>
                            </div>
                            @if($event['status'] === 'active')
                                <span
                                    class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-semibold">Active</span>
                            @else
                                <span class="px-3 py-1 bg-red-500/20 text-red-400 rounded-full text-xs font-semibold">Sold
                                    Out</span>
                            @endif
                        </div>
                        <div class="flex justify-end items-center gap-2 mt-3 mb-4">
                            <button type="button" class="edit-btn inline-flex items-center justify-center h-8 w-8 rounded-md bg-white/5 hover:bg-white/10 text-sm"
                                title="Edit"
                                data-id="{{ $event['event_id'] }}"
                                data-title="{{ $event['title'] }}"
                                data-date="{{ $event['date'] }}"
                                data-time="{{ $event['time'] }}"
                                data-location="{{ $event['location'] }}"
                                data-adress="{{ $event['adress'] }}"
                                data-description="{{ $event['description'] }}"
                                >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a1 1 0 0 0 0-1.41l-2.34-2.34a1 1 0 0 0-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" />
                                </svg>
                            </button>

                            <form method="POST" action="{{ url('/admin/events/'.$event['event_id']) }}" onsubmit="return confirm('Delete this event?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Delete" class="inline-flex items-center justify-center h-8 w-8 rounded-md bg-red-600 hover:bg-red-700 text-white text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 2a10 10 0 100 20 10 10 0 000-20zm4 11H8v-2h8v2z" />
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <div class="grid grid-cols-3 gap-4 pt-4 border-t border-white/10">
                            <div>
                                <div class="text-xs text-gray-500 mb-1">Tickets Sold</div>
                                <div class="font-semibold">{{ $event['tickets_sold'] }}/{{ $event['max_spots'] }}</div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500 mb-1">Revenue</div>
                                <div class="font-semibold">${{ $event['revenue'] }}</div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500 mb-1">Fill Rate</div>
                                <div class="font-semibold">{{ round(($event['tickets_sold'] / $event['max_spots']) * 100) }}%
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div id="content-users" class="hidden">
            <h2 class="text-2xl font-bold mb-6">User Management</h2>
            <div class="bg-white/5 rounded-2xl border border-white/10 overflow-hidden">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-white/10">
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">User</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Email</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Events</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/10">
                        <tr>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center font-semibold">
                                        JD</div>
                                    <span>John Doe</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-400">john@example.com</td>
                            <td class="px-6 py-4 text-gray-400">24</td>
                            <td class="px-6 py-4"><span
                                    class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-semibold">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center font-semibold">
                                        AS</div>
                                    <span>Alice Smith</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-400">alice@example.com</td>
                            <td class="px-6 py-4 text-gray-400">18</td>
                            <td class="px-6 py-4"><span
                                    class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-semibold">Active</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="content-analytics" class="hidden">
            <h2 class="text-2xl font-bold mb-6">Analytics</h2>
            <div class="grid lg:grid-cols-2 gap-6">
                <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                    <h3 class="text-lg font-semibold mb-4">Top Events</h3>
                    <div class="space-y-3">
                        @foreach($recentEvents as $index => $event)
                            <div class="flex justify-between p-3 bg-white/5 rounded-xl">
                                <div>
                                    <div class="font-medium">{{ $event['title'] }}</div>
                                    <div class="text-sm text-gray-400">${{ $event['revenue'] }} revenue</div>
                                </div>
                                <div class="text-xl font-bold text-gray-500">#{{ $index + 1 }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                    <h3 class="text-lg font-semibold mb-4">Revenue Chart</h3>
                    <div class="h-64 flex items-center justify-center bg-white/5 rounded-xl">
                        <div class="text-center text-gray-400">
                            <div class="text-4xl mb-2">📊</div>
                            <p class="text-sm">Chart visualization</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="content-settings" class="hidden">
            <h2 class="text-2xl font-bold mb-6">Settings</h2>
            <div class="max-w-2xl">
                <div class="bg-white/5 rounded-2xl p-6 border border-white/10">
                    <h3 class="text-lg font-semibold mb-4">General Settings</h3>
                    <form onsubmit="handleSettings(event)" class="space-y-4">
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Site Name</label>
                            <input type="text" value="Event Manager"
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Contact Email</label>
                            <input type="email" value="admin@eventmanager.com"
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
                        </div>
                        <button type="submit"
                            class="px-8 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200">Save
                            Settings</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

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

        // Toggle create event form
        function toggleForm() {
            const form = document.getElementById('eventForm');
            form.classList.toggle('hidden');
            if (!form.classList.contains('hidden')) {
                document.getElementById('title').focus();
            }
        }

        // Handle create event form submission
        function handleCreateEvent(e) {
            e.preventDefault();
            const title = document.getElementById('title').value;
            const date = document.getElementById('date').value;
            const location = document.getElementById('location').value;
            const capacity = document.getElementById('capacity').value;
            
            alert('✅ Event Created Successfully!\n\n' + 
                  'Title: ' + title + '\n' +
                  'Date: ' + date + '\n' +
                  'Location: ' + location + '\n' +
                  'Capacity: ' + capacity + '\n\n' +
                  'This will be connected to the database later.');
            
            e.target.reset();
            toggleForm();
        }

        // Handle settings form submission
        function handleSettings(e) {
            e.preventDefault();
            const siteName = e.target.querySelector('input[type="text"]').value;
            const email = e.target.querySelector('input[type="email"]').value;
            
            alert('✅ Settings Saved Successfully!\n\n' +
                  'Site Name: ' + siteName + '\n' +
                  'Contact Email: ' + email + '\n\n' +
                  'This will be connected to the database later.');
        }

        // Wire edit buttons to prefill the form
        (function(){
            const editBtns = document.querySelectorAll('.edit-btn');
            const form = document.getElementById('event-form');
            const heading = document.getElementById('event-form-heading');
            const submitBtn = document.getElementById('event-form-submit');
            const cancelBtn = document.getElementById('event-form-cancel');

            if(!form) return;

            function switchToCreate(){
                form.removeAttribute('data-editing');
                const methodInput = form.querySelector('input[name="_method"]');
                if(methodInput) methodInput.remove();
                form.action = "{{ url('/admin/cms') }}";
                if(heading) heading.textContent = 'Create New Event';
                if(submitBtn) submitBtn.textContent = 'Create';
                form.reset();
            }

            function switchToEdit(data){
                form.setAttribute('data-editing', data.id);
                // set form action and add _method=PUT
                form.action = '/admin/events/' + data.id;
                let methodInput = form.querySelector('input[name="_method"]');
                if(!methodInput){
                    methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    form.appendChild(methodInput);
                }
                methodInput.value = 'PUT';

                // fill fields
                form.querySelector('#title').value = data.title || '';
                form.querySelector('#date').value = data.date || '';
                if(form.querySelector('#time')) form.querySelector('#time').value = data.time || '';
                form.querySelector('#location').value = data.location || '';
                form.querySelector('#adress').value = data.adress || '';
                if(form.querySelector('#max_spots')) form.querySelector('#max_spots').value = data.max_spots || data.maxSpots || '';
                if(form.querySelector('#description')) form.querySelector('#description').value = data.description || '';

                if(heading) heading.textContent = 'Edit Event';
                if(submitBtn) submitBtn.textContent = 'Save changes';
                // show form
                const wrap = document.getElementById('eventForm');
                if(wrap) wrap.classList.remove('hidden');
            }

            editBtns.forEach(btn => {
                btn.addEventListener('click', function(){
                    const data = {
                        id: btn.dataset.id,
                        title: btn.dataset.title,
                        date: btn.dataset.date,
                        time: btn.dataset.time,
                        location: btn.dataset.location,
                        adress: btn.dataset.adress,
                        description: btn.dataset.description,
                        max_spots: btn.dataset.max_spots
                    };
                    switchToEdit(data);
                });
            });

            if(cancelBtn){
                cancelBtn.addEventListener('click', function(){
                    switchToCreate();
                    document.getElementById('eventForm').classList.add('hidden');
                });
            }
        })();
    </script>

</body>

</html>