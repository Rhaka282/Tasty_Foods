<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Tasty Food - Admin Panel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased" style="font-family: 'Poppins', sans-serif;">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1495195134817-a165d3f92e01?q=80&w=2000&auto=format&fit=crop');">
            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/60"></div>
            
            <div class="relative z-10 text-center mb-6">
                <a href="/" class="flex flex-col items-center">
                    <h1 class="text-4xl font-bold text-white tracking-wider">TASTY FOOD</h1>
                    <p class="text-gray-300 tracking-widest uppercase text-sm mt-2">Admin Dashboard</p>
                </a>
            </div>

            <div class="relative z-10 w-full sm:max-w-md mt-2 px-4 py-8 sm:px-8 sm:py-10 bg-white shadow-2xl overflow-hidden sm:rounded-2xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
