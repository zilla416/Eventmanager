@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
<div class="flex flex-col">
    <a href="{{  route('loginpage') }}">Login page</a>
    <div class="border border-gray-300 max-w-2xl mx-auto p-20">
        <img src="" alt="">
        <h1>event title</h1>
        <p>locatie</p>
        <p>datum</p>
        <p>tijd</p>
        <p>prijs</p>
        <p>beschikbaarheid</p>
    </div>
</div>
@endsection