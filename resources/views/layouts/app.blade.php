<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - EventManager</title>
    @vite(['resources/css/app.css'])
    @stack('styles')
</head>

<body class="bg-black text-white antialiased">
    @include('partials.header')
    <main>
        @yield('content')
    </main>
    @include('partials.footer')
    @stack('scripts')
</body>

</html>