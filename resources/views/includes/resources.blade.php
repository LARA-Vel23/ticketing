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
