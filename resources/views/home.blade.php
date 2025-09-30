@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <div class="flex flex-col">
        <div>
            
        </div>
        <img class="h-100 object-cover" src="https://images.unsplash.com/photo-1740459057005-65f000db582f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjb25jZXJ0JTIwc3RhZ2UlMjBsaWdodHN8ZW58MXx8fHwxNzU4NzgyMzg1fDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral"
            alt="">

        @if($event)
            <div class="border border-gray-300 max-w-2xl mx-auto p-20">
                <img src="{{ Vite::asset($event->image) }}" alt="{{ $event->title }}" class="mb-4">
                <h1 class="text-2xl font-bold mb-2">{{ $event->title }}</h1>
                <p><strong>Location:</strong> {{ $event->location }}</p>
                <p><strong>Adress:</strong> {{ $event->adress }}</p>
                <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->translatedFormat('d F Y') }}</p>
                <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($event->time)->format('H:i') }}</p>
                <p><strong>Price:</strong> €--</p>
                <p><strong>Availability:</strong> {{ $event->available_spots }}</p>
                <p class="mt-4">{{ $event->description }}</p>
            </div>
        @else
            <p class="text-center mt-10">No events found.</p>
        @endif
    </div>
@endsection