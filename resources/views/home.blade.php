@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
<div class="flex flex-col">

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