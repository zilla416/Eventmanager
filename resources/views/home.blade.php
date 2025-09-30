@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
<h1>Homepage</h1>
<div class="flex flex-col">
    <a href="{{  route('eventpage') }}">Event page</a>
</div>
@endsection