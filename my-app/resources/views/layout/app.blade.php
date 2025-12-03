<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name', 'KickCraze'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('Images/logo.png') }}" type="image/png">
</head>
<body class="bg-gray-100">

    {{-- Navigation --}}
    @include('components.navbar')
    @include('components.subnav')
    @include('components.banner')
  

    {{-- Page Content --}}
    <main class="py-6 px-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

</body>
</html>
