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
<a href="/" class="px-4 py-2 border border-white/20 rounded-full text-sm hover:bg-white/5 transition">Back to Site</a>
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
<button onclick="showTab('events')" id="tab-events" class="px-6 py-3 bg-white text-black rounded-full text-sm font-semibold">Events</button>
<button onclick="showTab('users')" id="tab-users" class="px-6 py-3 bg-white/5 rounded-full text-sm border border-white/10">Users</button>
<button onclick="showTab('analytics')" id="tab-analytics" class="px-6 py-3 bg-white/5 rounded-full text-sm border border-white/10">Analytics</button>
<button onclick="showTab('settings')" id="tab-settings" class="px-6 py-3 bg-white/5 rounded-full text-sm border border-white/10">Settings</button>
</div>

<div id="content-events">
<div class="mb-6 flex justify-between items-center">
<h2 class="text-2xl font-bold">Events</h2>
<button onclick="toggleForm()" class="px-6 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200 transition">+ Create Event</button>
</div>

<div id="eventForm" class="bg-white/5 rounded-2xl p-6 border border-white/10 mb-6 hidden">
<h3 class="text-xl font-semibold mb-4">Create New Event</h3>
<form onsubmit="handleCreateEvent(event)" class="space-y-4">
<div class="grid md:grid-cols-2 gap-4">
<div>
<label class="block text-sm text-gray-400 mb-2">Event Title</label>
<input type="text" id="title" required class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
</div>
<div>
<label class="block text-sm text-gray-400 mb-2">Date</label>
<input type="date" id="date" required class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
</div>
<div>
<label class="block text-sm text-gray-400 mb-2">Location</label>
<input type="text" id="location" required class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
</div>
<div>
<label class="block text-sm text-gray-400 mb-2">Capacity</label>
<input type="number" id="capacity" required class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
</div>
</div>
<div class="flex gap-3">
<button type="submit" class="px-8 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200">Create</button>
<button type="button" onclick="toggleForm()" class="px-8 py-3 border border-white/20 rounded-full hover:bg-white/5">Cancel</button>
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
<span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-semibold">Active</span>
@else
<span class="px-3 py-1 bg-red-500/20 text-red-400 rounded-full text-xs font-semibold">Sold Out</span>
@endif
</div>
<div class="grid grid-cols-3 gap-4 pt-4 border-t border-white/10">
<div>
<div class="text-xs text-gray-500 mb-1">Tickets Sold</div>
<div class="font-semibold">{{ $event['tickets_sold'] }}/{{ $event['capacity'] }}</div>
</div>
<div>
<div class="text-xs text-gray-500 mb-1">Revenue</div>
<div class="font-semibold">${{ $event['revenue'] }}</div>
</div>
<div>
<div class="text-xs text-gray-500 mb-1">Fill Rate</div>
<div class="font-semibold">{{ round(($event['tickets_sold'] / $event['capacity']) * 100) }}%</div>
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
<div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center font-semibold">JD</div>
<span>John Doe</span>
</div>
</td>
<td class="px-6 py-4 text-gray-400">john@example.com</td>
<td class="px-6 py-4 text-gray-400">24</td>
<td class="px-6 py-4"><span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-semibold">Active</span></td>
</tr>
<tr>
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center font-semibold">AS</div>
<span>Alice Smith</span>
</div>
</td>
<td class="px-6 py-4 text-gray-400">alice@example.com</td>
<td class="px-6 py-4 text-gray-400">18</td>
<td class="px-6 py-4"><span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-semibold">Active</span></td>
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
<input type="text" value="Event Manager" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
</div>
<div>
<label class="block text-sm text-gray-400 mb-2">Contact Email</label>
<input type="email" value="admin@eventmanager.com" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-white/20">
</div>
<button type="submit" class="px-8 py-3 bg-white text-black rounded-full font-semibold hover:bg-gray-200">Save Settings</button>
</form>
</div>
</div>
</div>

</div>

<script>
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

function toggleForm() {
document.getElementById('eventForm').classList.toggle('hidden');
}

function handleCreateEvent(e) {
e.preventDefault();
const title = document.getElementById('title').value;
const date = document.getElementById('date').value;
const location = document.getElementById('location').value;
const capacity = document.getElementById('capacity').value;
alert('Event created!\n\nTitle: ' + title + '\nDate: ' + date + '\nLocation: ' + location + '\nCapacity: ' + capacity);
e.target.reset();
toggleForm();
}

function handleSettings(e) {
e.preventDefault();
alert('Settings saved successfully!');
}
</script>

</body>
</html>
