<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gradient-to-r from-indigo-900 to-gray-900 text-pink-400">
    @include('layouts.navigation')

    <!-- Page Heading -->
        <header class="bg-gray-900 bg-opacity-60">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white text-opacity-80">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main>
            @if(session()->has('success'))
                <div class="bg-indigo-400 p-4 my-2 mx-10 rounded-2xl text-indigo-900">
                        {{ session('success') }}
                </div>
            @endif
            {{ $slot }}
        </main>
    </div>
</body>
</html>
