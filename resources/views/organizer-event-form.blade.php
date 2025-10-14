@extends('layouts.app')

@section('title', isset($event) ? 'Edit Event' : 'Create Event')

@section('content')
<div class="min-h-screen bg-black text-white">
    <!-- Header -->
    <div class="bg-white/5 border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6">
                <div>
                    <h1 class="text-5xl font-bold mb-3">{{ isset($event) ? 'Edit Event' : 'Create Event' }}</h1>
                    <p class="text-gray-400 text-lg">{{ isset($event) ? 'Update your event details' : 'Add a new event to your portfolio' }}</p>
                </div>
                <a href="{{ route('organizer.cms') }}" class="px-6 py-3 bg-white/10 hover:bg-white/20 text-white rounded-xl font-semibold transition-all hover:scale-105">
                    ← Back to Dashboard
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        @if(session('success'))
            <div class="bg-green-500/20 border border-green-500/50 text-green-400 px-6 py-4 rounded-xl mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-500/20 border border-red-500/50 text-red-400 px-6 py-4 rounded-xl mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($event) ? route('organizer.events.update', $event->event_id) : route('organizer.events.store') }}" 
              method="POST" 
              enctype="multipart/form-data" 
              class="bg-white/5 backdrop-blur-sm rounded-2xl border border-white/10 p-8">
            @csrf
            @if(isset($event))
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Event Title -->
                <div class="md:col-span-2">
                    <label for="title" class="block text-sm font-semibold mb-2">Event Title *</label>
                    <input type="text" 
                           name="title" 
                           id="title" 
                           value="{{ old('title', $event->title ?? '') }}"
                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl focus:outline-none focus:ring-2 focus:ring-white/30 text-white placeholder-gray-400"
                           placeholder="Enter event title"
                           required>
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="block text-sm font-semibold mb-2">Category *</label>
                    <select name="category" 
                            id="category" 
                            class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl focus:outline-none focus:ring-2 focus:ring-white/30 text-white"
                            required>
                        <option value="music" {{ old('category', $event->category ?? '') == 'music' ? 'selected' : '' }}>Music</option>
                        <option value="sports" {{ old('category', $event->category ?? '') == 'sports' ? 'selected' : '' }}>Sports</option>
                        <option value="theater" {{ old('category', $event->category ?? '') == 'theater' ? 'selected' : '' }}>Theater</option>
                        <option value="comedy" {{ old('category', $event->category ?? '') == 'comedy' ? 'selected' : '' }}>Comedy</option>
                        <option value="family" {{ old('category', $event->category ?? '') == 'family' ? 'selected' : '' }}>Family</option>
                    </select>
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block text-sm font-semibold mb-2">Ticket Price (€) *</label>
                    <input type="number" 
                           name="price" 
                           id="price" 
                           value="{{ old('price', $event->price ?? '') }}"
                           step="0.01"
                           min="0"
                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl focus:outline-none focus:ring-2 focus:ring-white/30 text-white placeholder-gray-400"
                           placeholder="0.00"
                           required>
                </div>

                <!-- Date -->
                <div>
                    <label for="date" class="block text-sm font-semibold mb-2">Event Date *</label>
                    <input type="date" 
                           name="date" 
                           id="date" 
                           value="{{ old('date', $event->date ?? '') }}"
                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl focus:outline-none focus:ring-2 focus:ring-white/30 text-white"
                           required>
                </div>

                <!-- Time -->
                <div>
                    <label for="time" class="block text-sm font-semibold mb-2">Event Time *</label>
                    <input type="time" 
                           name="time" 
                           id="time" 
                           value="{{ old('time', $event->time ?? '') }}"
                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl focus:outline-none focus:ring-2 focus:ring-white/30 text-white"
                           required>
                </div>

                <!-- Location -->
                <div>
                    <label for="location" class="block text-sm font-semibold mb-2">Venue Name *</label>
                    <input type="text" 
                           name="location" 
                           id="location" 
                           value="{{ old('location', $event->location ?? '') }}"
                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl focus:outline-none focus:ring-2 focus:ring-white/30 text-white placeholder-gray-400"
                           placeholder="e.g., Madison Square Garden"
                           required>
                </div>

                <!-- Address -->
                <div>
                    <label for="adress" class="block text-sm font-semibold mb-2">Address *</label>
                    <input type="text" 
                           name="adress" 
                           id="adress" 
                           value="{{ old('adress', $event->adress ?? '') }}"
                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl focus:outline-none focus:ring-2 focus:ring-white/30 text-white placeholder-gray-400"
                           placeholder="e.g., 4 Pennsylvania Plaza, New York"
                           required>
                </div>

                <!-- Max Spots -->
                <div class="md:col-span-2">
                    <label for="max_spots" class="block text-sm font-semibold mb-2">Maximum Tickets *</label>
                    <input type="number" 
                           name="max_spots" 
                           id="max_spots" 
                           value="{{ old('max_spots', $event->max_spots ?? '') }}"
                           min="1"
                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl focus:outline-none focus:ring-2 focus:ring-white/30 text-white placeholder-gray-400"
                           placeholder="e.g., 500"
                           required>
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-semibold mb-2">Event Description</label>
                    <textarea name="description" 
                              id="description" 
                              rows="4"
                              class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl focus:outline-none focus:ring-2 focus:ring-white/30 text-white placeholder-gray-400 resize-none"
                              placeholder="Describe your event...">{{ old('description', $event->description ?? '') }}</textarea>
                </div>

                <!-- Image Upload -->
                <div class="md:col-span-2">
                    <label for="image" class="block text-sm font-semibold mb-2">Event Image</label>
                    <input type="file" 
                           name="image" 
                           id="image" 
                           accept="image/*"
                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl focus:outline-none focus:ring-2 focus:ring-white/30 text-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-white file:text-black hover:file:bg-gray-200">
                    @if(isset($event) && $event->image)
                        <p class="text-sm text-gray-400 mt-2">Current image: {{ basename($event->image) }}</p>
                    @endif
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex gap-4 mt-8">
                <button type="submit" 
                        class="flex-1 px-6 py-4 bg-white text-black rounded-xl font-semibold hover:bg-gray-200 transition-all hover:scale-105 shadow-lg">
                    {{ isset($event) ? 'Update Event' : 'Create Event' }}
                </button>
                <a href="{{ route('organizer.cms') }}" 
                   class="px-6 py-4 bg-white/10 hover:bg-white/20 rounded-xl font-semibold transition-all hover:scale-105">
                    Cancel
                </a>
            </div>
        </form>

        @if(isset($event))
            <!-- Delete Event Section -->
            <div class="mt-6 bg-red-500/10 border border-red-500/30 rounded-2xl p-6">
                <h3 class="text-xl font-bold text-red-400 mb-2">Danger Zone</h3>
                <p class="text-gray-400 mb-4">Once you delete an event, there is no going back. Please be certain.</p>
                <form action="{{ route('organizer.events.destroy', $event->event_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-3 bg-red-600 hover:bg-red-700 rounded-xl font-semibold transition">
                        Delete Event
                    </button>
                </form>
            </div>
        @endif

    </div>
</div>
@endsection
