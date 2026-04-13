<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body>

    <head class="my-12">
        @include('components.navbar')
    </head>
    <main>
        @yield('content')
    </main>
    <footer class="bg-neutral-primary-soft">
        @include('components.footer')
    </footer>
</body>

</html>
