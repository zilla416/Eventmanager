<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('homepage');

Route::get('/counter', function () {
    return view('counter');
})->name('counterpage');

Route::get('/about', function() {
    return view('about');
})->name('aboutpage');
