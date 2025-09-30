<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('homepage');

Route::get('/event', function() {
    return view('event');
})->name('eventpage');