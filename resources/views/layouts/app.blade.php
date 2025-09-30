<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css'])
    @stack('styles')
    @stack('scripts')
</head>

<body class="max-w-7xl mx-auto">
    @include('partials.header')
    <main class="">
        @yield('content')
    </main>
    @include('partials.footer')
</body>

</html>