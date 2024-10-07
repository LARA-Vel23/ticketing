<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('includes.resources')
    @livewireStyles
</head>

<body>
    @include('includes.sidebar')
    <div class="wrapper d-flex flex-column min-vh-100">
        @include('includes.header')
        <main class="body flex-grow-1">
            <div class="px-4">
                @yield('content')
            </div>
        </main>
        @include('includes.footer')
    </div>
    <livewire:modals />
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
    @stack('modals')
    <script src="https://coreui.io/demos/bootstrap/5.0/free/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="https://coreui.io/demos/bootstrap/5.0/free/vendors/simplebar/js/simplebar.min.js"></script>
    @stack('scripts')
</body>

</html>
