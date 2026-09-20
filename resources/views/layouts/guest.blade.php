<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

<title>InteOffice | Espacios que inspiran</title>

<link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}?v=2">
<link rel="shortcut icon" href="{{ asset('favicon.svg') }}?v=2">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=playfair-display:400,500,600|montserrat:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="antialiased">
        <div
            class="min-h-screen flex flex-col justify-center items-center px-6 py-12"
            style="background-color: #F4F1EB; font-family: 'Montserrat', sans-serif;"
        >
            <div class="mb-10 w-full flex justify-center">
                <a href="/" class="inline-block">
                    <x-application-logo />
                </a>
            </div>

            <div
                class="w-full sm:max-w-md px-8 sm:px-10 py-10 border border-[#D8D2C8]"
                style="background-color: #FAF8F4;"
            >
                {{ $slot }}
            </div>

            <p class="mt-8 text-[10px] tracking-[0.28em] uppercase text-[#8A837A]">
                Mobiliario · Diseño · Espacios
            </p>
        </div>
    </body>
</html>