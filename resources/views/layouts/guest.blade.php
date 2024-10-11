<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('includes.resources')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @livewireStyles
</head>
<body>
    @yield('content')
    <livewire:modals />
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
    @stack('modals')
    @stack('scripts')
</body>

</html>
