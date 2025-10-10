<header class="flex flex-col">
    <div class="pt-6 pb-3 flex flex-row justify-between items-center border-b border-gray-200">
        <a href="{{ route('homepage') }}"><h1 class="text-blue-600 font-bold text-3xl">EventManager</h1></a>
        <div onmousedown="event.preventDefault()" onclick="document.getElementById('search-input').focus();" class="flex flew-row items-center gap-3 border border-gray-300 rounded-lg text-md pl-4 pr-10 py-2 w-2xl">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6 text-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <input id="search-input" class="outline-none w-full" type="text" placeholder="Search for events, artists, teams, and more">
        </div>
        <div id="header-buttons" class="flex flex-row items-center gap-2 font-semibold">
            <a class="flex flex-row items-center gap-3 py-2 px-4 rounded-lg duration-300 transition hover:bg-gray-200" href=""><img
                    class="w-5 h-5" src="{{ Vite::asset('resources/img/location-icon.png') }}" alt="">Utrecht,
                NL</a>
            <a class="py-2 px-4 rounded-lg duration-300 transition hover:bg-gray-200" href="{{ route('register') }}">Sign In</a>
            <a class="flex flex-row items-center gap-3 bg-blue-600 text-white py-2 px-4 rounded-lg duration-300 transition hover:bg-blue-700"
                href="{{  route('loginpage') }}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
                Account</a>
        </div>
    </div>
    <nav class="flex flex-row items-center gap-6 py-3 font-medium">
        <a class="duration-100 transition hover:text-blue-600" href="#">Sports</a>
        <a class="duration-100 transition hover:text-blue-600" href="#">Concerts</a>
        <a class="duration-100 transition hover:text-blue-600" href="#">Theater</a>
        <a class="duration-100 transition hover:text-blue-600" href="#">Comedy</a>
        <a class="duration-100 transition hover:text-blue-600" href="#">Family</a>
        <a class="duration-100 transition hover:text-blue-600" href="#">Sell Tickets</a>
    </nav>
</header>