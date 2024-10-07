@extends('layouts.guest')
@section('content')
    <div id="authentication">
        <div class="container" id="container">
            <div class="form-container sign-up">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div><h1 class="fw-bold">{{ __('Create Account') }}</h1></div>
                    <span>{{ __('Use your email for registeration') }}</span>
                    <input
                        id="name"
                        type="text"
                        class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                        required
                        autocomplete="name"
                        autofocus
                        placeholder="Name"
                    >
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input
                        id="email"
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        placeholder="Email"
                    >
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input
                        id="password"
                        type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password"
                        required
                        autocomplete="new-password"
                        placeholder="Password"
                    >
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input
                        id="password-confirm"
                        type="password"
                        class="form-control"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Confirm Password"
                    >
                    <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                </form>
            </div>
            <div class="form-container sign-in">
                <form class="" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="d-flex align-items-center justify-content-center">
                        <h1 class="fw-bold">{{ __('Login') }}</h1>
                    </div>

                    <label for="email" class="pt-3">{{ __('Email') }}</label>
                    <input
                        id="email"
                        type="email"
                        placeholder="Email"
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        autofocus
                        required
                    >

                    <label for="email" class="pt-2">{{ __('Password') }}</label>
                    <input
                        id="password"
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password"
                        required
                        placeholder="Password"
                        autocomplete="current-password"
                    >

                    {{-- <a href="#">Forget Your Password?</a> --}}
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    <button type="submit" class="btn btn-primary">{{ __('Log in') }}</button>
                </form>
            </div>
            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <div class="d-flex justify-content-center align-items-center mb-2">
                            <img src="{{url('/images/login_card.png')}}" alt="logo" class="responsive-logo" style="width: 200px; ">
                        </div>
                        {{-- <h1>Welcome Back!</h1> --}}
                        <p>Enter your personal details to use all of site features</p>
                        <button class="hidden" id="login">Log In</button>
                    </div>
                    <div class="toggle-panel toggle-right">
                        <div class="d-flex justify-content-center align-items-center mb-2">
                            <img src="{{url('/images/login_card.png')}}" alt="logo" class="responsive-logo" style="width: 200px; ">
                        </div>
                        {{-- <h1>Hello, Friend!</h1> --}}
                        <p>Register with your personal details to use all of site features</p>
                        <button class="hidden" id="register">Register</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        const container = document.getElementById('container');
        const registerBtn = document.getElementById('register');
        const loginBtn = document.getElementById('login');

        registerBtn.addEventListener('click', () => {
            container.classList.add("active");
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove("active");
        });
    </script>
@endpush
