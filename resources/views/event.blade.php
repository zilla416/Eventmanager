@extends('layouts.app')

@section('title', content: 'eventpage')

@section('content')
    <img src="{{ Vite::asset($event->image) }}" alt="{{ $event->title }}" class="w-full rounded-tl-xl rounded-tr-xl">
@endsection