<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
        .bg-custom-blue {
            background-color: #007bff; 
        }
    </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen  bg-white">
            <div>
            @if (isset($navigation))
                {{ $navigation }}

            @endif
            </div>
            <!-- Page Heading -->
            @isset($header)
                <header class="dark:bg-gray-800 shadow bg-custom-blue">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="m-5">
                {{ $slot }}
            </main>
        </div>
        <footer class="py-16 text-center text-sm text-black dark:text-white/70">
               Alfiatul Fitria &copy; 2024 
        </footer>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js('app')"></script>
</html>
