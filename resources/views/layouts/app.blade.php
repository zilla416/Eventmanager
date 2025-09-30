<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css'])
    @stack('styles')
</head>

@stack('scripts')

<body class="max-w-7xl mx-auto">
    <header class="flex flex-col">
        <div class="h-22 flex flex-row justify-between items-center">
            <h1 class="text-blue-600 font-bold text-3xl">EventManager</h1>
            <input class="border border-gray-300 rounded-lg outline-gray-400 text-md pl-4 pr-10 py-2 w-2xl" type="text" placeholder="Search for events, artists, teams, and more">
            <div id="header-buttons" class="flex flex-row items-center gap-2 font-semibold">
                <a class="flex flex-row items-center gap-3 py-2 px-4 rounded-lg hover:bg-gray-200" href=""><img class="w-5 h-5" src="{{ Vite::asset('resources/img/location-icon.png') }}" alt="">Utrecht, NL</a>
                <a class="py-2 px-4 rounded-lg hover:bg-gray-200" href="">Sign In</a>
                <a class="flex flex-row items-center gap-3 py-2 px-4 rounded-lg" href=""><img class="w-5 h-5" src="{{ Vite::asset('resources/img/user-icon.png') }}" alt="">Account</a>
            </div>
        </div>
        <nav>
            sports
        </nav>
    </header>
    @yield('content')
</body>

</html>