<link rel="stylesheet" href="https://coreui.io/demos/bootstrap/5.0/free/vendors/simplebar/css/simplebar.css">
<link rel="stylesheet" href="https://coreui.io/demos/bootstrap/5.0/free/css/vendors/simplebar.css">
<link rel="stylesheet" href="https://coreui.io/demos/bootstrap/5.0/free/css/style.css">
<link rel="stylesheet" href="https://coreui.io/demos/bootstrap/5.0/free/css/examples.css">
<link rel="stylesheet" href="https://coreui.io/demos/bootstrap/5.0/free/css/ads.css">
@if(App::environment('production'))
    @php
        $files = File::allFiles(public_path()."/build/assets");
        $script = $files[1]->getFilename();
        $css = $files[0]->getFilename();
    @endphp
    <link rel="stylesheet" href="{{ asset('build/assets') }}/{{ $css }}">
    <script src="{{ asset('build/assets') }}/{{ $script }}"></script>
@endif

@if(App::environment('local'))
    @vite(['resources/js/app.js'])
@endif
