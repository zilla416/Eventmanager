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
        <div class="pt-6 pb-3 flex flex-row justify-between items-center border-b border-gray-200">
            <h1 class="text-blue-600 font-bold text-3xl">EventManager</h1>
            <input class="border border-gray-300 rounded-lg outline-gray-400 text-md pl-4 pr-10 py-2 w-2xl" type="text"
                placeholder="Search for events, artists, teams, and more">
            <div id="header-buttons" class="flex flex-row items-center gap-2 font-semibold">
                <a class="flex flex-row items-center gap-3 py-2 px-4 rounded-lg hover:bg-gray-200" href=""><img
                        class="w-5 h-5" src="{{ Vite::asset('resources/img/location-icon.png') }}" alt="">Utrecht,
                    NL</a>
                <a class="py-2 px-4 rounded-lg hover:bg-gray-200" href="">Sign In</a>
                <a class="flex flex-row items-center gap-3 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700"
                    href="{{  route('loginpage') }}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    Account</a>
            </div>
        </div>
        <nav class="flex flex-row items-center gap-6 py-3 font-medium">
            <a class="hover:text-blue-600" href="#">Sports</a>
            <a class="hover:text-blue-600" href="#">Concerts</a>
            <a class="hover:text-blue-600" href="#">Theater</a>
            <a class="hover:text-blue-600" href="#">Comedy</a>
            <a class="hover:text-blue-600" href="#">Family</a>
            <a class="hover:text-blue-600" href="#">Sell Tickets</a>
        </nav>
    </header>
    @yield('content')
</body>

</html>