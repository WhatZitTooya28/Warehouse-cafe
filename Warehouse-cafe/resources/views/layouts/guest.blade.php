<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts and Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Poppins', sans-serif;
            }
            .custom-placeholder::placeholder {
                color: #A0AEC0;
                font-weight: 500;
            }
        </style>
    </head>
    <body class="flex items-center justify-center min-h-screen bg-[#1a202c]">
        <div class="w-full max-w-4xl p-4">
            <div class="bg-[#1F2A40] rounded-2xl shadow-lg flex flex-col md:flex-row min-h-[600px]">

                <!-- Kolom Kiri: Ilustrasi -->
                <div class="w-full md:w-1/2 p-8 flex items-center justify-center">
                    <!-- Ilustrasi akan dimasukkan dari view anak (login, register, dll) -->
                    @yield('illustration')
                </div>

                <!-- Kolom Kanan: Form -->
                <div class="w-full md:w-1/2 bg-white rounded-2xl p-8 md:p-12 flex flex-col justify-center">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>