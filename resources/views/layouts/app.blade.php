<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'POS Admin' }}</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Compiled CSS (if using Laravel Mix or manually compiled assets) -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Compiled JS (optional if needed) -->
     <!-- Place jQuery before your script -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/sale_form.js') }}" defer></script>

    @stack('head')
</head>
<body class="flex bg-gray-100 min-h-screen" x-data="{ panel: false, menu: true }">
    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Main Content -->
    <div class="flex-grow text-gray-800">
        <!-- Header -->
        @include('partials.header')

        <!-- Page Content -->
        <main class="p-1 sm:p-2 space-y-1">
            @yield('content')
        </main>
    </div>
</body>
</html>
