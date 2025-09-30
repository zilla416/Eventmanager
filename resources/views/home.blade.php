@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
<h1>Homepage</h1>
<div class="flex flex-col">
    <a href="{{  route('loginpage') }}">Login page</a>
</div>
@endsection