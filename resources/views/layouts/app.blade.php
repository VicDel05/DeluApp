<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <link href="css/app.css" rel="stylesheet"> --}}
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
</head>
<body>

    <!-- Navbar -->
    @if (!Route::is('login'))
        @include('partials.navbar')   
    @endif

    <!-- Main Content -->
    <div class="container bg-gray-100">
        @yield('content')
    </div>

    <!-- Footer -->
    {{-- @include('partials.footer') --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> --}}
    {{-- <script src="{ asset('js/app.js') }}"></script> --}}
</body>
</html>
