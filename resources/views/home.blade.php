@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <div class="flex flex-col">
        <section id="hero-section">

        </section>
        <img class="h-100 object-cover"
            src="https://images.unsplash.com/photo-1740459057005-65f000db582f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjb25jZXJ0JTIwc3RhZ2UlMjBsaWdodHN8ZW58MXx8fHwxNzU4NzgyMzg1fDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral"
            alt="">
        <section id="events-section" class="flex flex-col gap-5 my-12">
            <div class="">
                <h2 class="font-bold text-3xl">Discover Events</h2>
                <p class="text-black/60">Find the perfect event for you</p>
            </div>
            <div class="flex flex-row items-center w-full px-2 h-10 bg-gray-100 rounded-xl">
                <Button>
                    All Events
                </Button>
            </div>
            @if($event)
                <div class="flex flex-row flex-wrap gap-4">
                    <a href="{{ route('eventpage') }}">
                        <div class="border border-gray-200 shadow-sm rounded-xl w-3/10 h-100 mx-auto">
                            <img src="{{ Vite::asset($event->image) }}" alt="{{ $event->title }}"
                                class="w-full rounded-tl-xl rounded-tr-xl">
                            <div id="event-content" class="px-4">
                                <p class="font-semibold text-xl">{{ $event->title }}</p>
                                {{-- <p><strong>Location:</strong> {{ $event->location }}</p> --}}
                                {{-- <p><strong>Adress:</strong> {{ $event->adress }}</p>
                                <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->translatedFormat('d F Y') }}
                                </p>
                                <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($event->time)->format('H:i') }}</p>
                                <p><strong>Price:</strong> €--</p>
                                <p class="mt-4">{{ $event->description }}</p> --}}
                                {{-- <p><strong>Availability:</strong> {{ $event->available_spots }}</p> --}}
                            </div>
                        </div>
                    </a>
                    <div class="border border-gray-200 shadow-sm rounded-xl w-3/10 h-100 mx-auto">
                        <img src="{{ Vite::asset($event->image) }}" alt="{{ $event->title }}"
                            class="w-full rounded-tl-xl rounded-tr-xl">
                        <div id="event-content" class="px-4">
                            <p class="font-semibold text-xl">{{ $event->title }}</p>
                            {{-- <p><strong>Location:</strong> {{ $event->location }}</p> --}}
                            {{-- <p><strong>Adress:</strong> {{ $event->adress }}</p>
                            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->translatedFormat('d F Y') }}</p>
                            <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($event->time)->format('H:i') }}</p>
                            <p><strong>Price:</strong> €--</p>
                            <p class="mt-4">{{ $event->description }}</p> --}}
                            {{-- <p><strong>Availability:</strong> {{ $event->available_spots }}</p> --}}
                        </div>
                    </div>
                    <div class="border border-gray-200 shadow-sm rounded-xl w-3/10 h-100 mx-auto">
                        <img src="{{ Vite::asset($event->image) }}" alt="{{ $event->title }}"
                            class="w-full rounded-tl-xl rounded-tr-xl">
                        <div id="event-content" class="px-4">
                            <p class="font-semibold text-xl">{{ $event->title }}</p>
                            {{-- <p><strong>Location:</strong> {{ $event->location }}</p> --}}
                            {{-- <p><strong>Adress:</strong> {{ $event->adress }}</p>
                            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->translatedFormat('d F Y') }}</p>
                            <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($event->time)->format('H:i') }}</p>
                            <p><strong>Price:</strong> €--</p>
                            <p class="mt-4">{{ $event->description }}</p> --}}
                            {{-- <p><strong>Availability:</strong> {{ $event->available_spots }}</p> --}}
                        </div>
                    </div>
                    <div class="border border-gray-200 shadow-sm rounded-xl w-3/10 h-100 mx-auto">
                        <img src="{{ Vite::asset($event->image) }}" alt="{{ $event->title }}"
                            class="w-full rounded-tl-xl rounded-tr-xl">
                        <div id="event-content" class="px-4">
                            <p class="font-semibold text-xl">{{ $event->title }}</p>
                            {{-- <p><strong>Location:</strong> {{ $event->location }}</p> --}}
                            {{-- <p><strong>Adress:</strong> {{ $event->adress }}</p>
                            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->translatedFormat('d F Y') }}</p>
                            <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($event->time)->format('H:i') }}</p>
                            <p><strong>Price:</strong> €--</p>
                            <p class="mt-4">{{ $event->description }}</p> --}}
                            {{-- <p><strong>Availability:</strong> {{ $event->available_spots }}</p> --}}
                        </div>
                    </div>
                    <div class="border border-gray-200 shadow-sm rounded-xl w-3/10 h-100 mx-auto">
                        <img src="{{ Vite::asset($event->image) }}" alt="{{ $event->title }}"
                            class="w-full rounded-tl-xl rounded-tr-xl">
                        <div id="event-content" class="px-4">
                            <p class="font-semibold text-xl">{{ $event->title }}</p>
                            {{-- <p><strong>Location:</strong> {{ $event->location }}</p> --}}
                            {{-- <p><strong>Adress:</strong> {{ $event->adress }}</p>
                            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->translatedFormat('d F Y') }}</p>
                            <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($event->time)->format('H:i') }}</p>
                            <p><strong>Price:</strong> €--</p>
                            <p class="mt-4">{{ $event->description }}</p> --}}
                            {{-- <p><strong>Availability:</strong> {{ $event->available_spots }}</p> --}}
                        </div>
                    </div>
                    <div class="border border-gray-200 shadow-sm rounded-xl w-3/10 h-100 mx-auto">
                        <img src="{{ Vite::asset($event->image) }}" alt="{{ $event->title }}"
                            class="w-full rounded-tl-xl rounded-tr-xl">
                        <div id="event-content" class="px-4">
                            <p class="font-semibold text-xl">{{ $event->title }}</p>
                            {{-- <p><strong>Location:</strong> {{ $event->location }}</p> --}}
                            {{-- <p><strong>Adress:</strong> {{ $event->adress }}</p>
                            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->translatedFormat('d F Y') }}</p>
                            <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($event->time)->format('H:i') }}</p>
                            <p><strong>Price:</strong> €--</p>
                            <p class="mt-4">{{ $event->description }}</p> --}}
                            {{-- <p><strong>Availability:</strong> {{ $event->available_spots }}</p> --}}
                        </div>
                    </div>
                </div>
            @else
                <p class="text-center mt-10">No events found.</p>
            @endif
        </section>
    </div>
@endsection