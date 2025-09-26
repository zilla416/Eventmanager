@extends('layouts.app')

@section('title', 'Counter Page')

@push('scripts')
    @vite(['resources/js/app.js'])
@endpush

@section('content')
    <a class="text-blue-500" href="{{ route('homepage') }}">return home</a>
    <div id="counterapp" class="flex flex-col gap-5 items-center">
        <h1>Counter: @{{ count }}</h1>
        <button @click="increment">+</button>
        <button @click="decrement">-</button>
        <button @click="reset">reset</button>
    </div>
@endsection