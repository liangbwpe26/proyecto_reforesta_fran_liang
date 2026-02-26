<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Re-Fores-Ta') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 flex flex-col min-h-screen">
<div class="flex-grow">
    @include('layouts.navigation')

    <main>
        {{ $slot }}
    </main>
</div>

<footer class="bg-gray-900 py-8 text-center text-gray-400 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center">
        <div class="mb-4 md:mb-0">
            <span class="text-xl font-bold text-white tracking-wider">Reforesta</span>
            <p class="text-sm mt-1">© {{ date('Y') }} Todos los derechos reservados.</p>
        </div>
        <div class="flex space-x-6 text-sm">
            <a href="{{ route('about') }}" class="hover:text-white transition">About us</a>
            <a href="{{ route('contacto') }}" class="hover:text-white transition">Contacto</a>
        </div>
    </div>
</footer>
</body>
</html>
