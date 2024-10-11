@extends('layouts.guest')
@section('content')
    <div id="authentication">
        <div class="container" id="container">
            <div class="form-container sign-up">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div><h1 class="fw-bold">{{ __('Forgot Password?') }}</h1></div>

                    <div class="d-flex justify-content-center align-items-center mb-2">
                        <img src="{{url('/images/forgotpassword.png')}}" alt="logo" class="responsive-logo" style="width: 200px; ">
                    </div>

                    <input
                        id="email"
                        type="email"
                        class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        autofocus
                        placeholder="Email Address"
                    >
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <button type="submit" class="btn btn-primary">{{ __('Send Password Reset Link') }}</button>
                </form>
            </div>
            <div class="form-container sign-in">
                <form class="" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="d-flex align-items-center justify-content-center">
                        <h1 class="fw-bold">{{ __('Login') }}</h1>
                    </div>

                    <label for="email" class="pt-1">{{ __('Email') }}</label>
                    <input
                        id="email"
                        type="email"
                        placeholder="Email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        autofocus
                        required
                    >

                    <label for="email" class="pt-1">{{ __('Password') }}</label>
                    <input
                        id="password"
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password"
                        required
                        placeholder="Password"
                        autocomplete="current-password"
                    >

                    <div class="g-recaptcha py-3" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>

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
                        <p>{{ __('Use your registered email to reset password') }}</p>
                        <button class="hidden" id="login">{{ __('Log In') }}</button>
                    </div>
                    <div class="toggle-panel toggle-right">
                        <div class="d-flex justify-content-center align-items-center mb-2">
                            <img src="{{url('/images/login_card.png')}}" alt="logo" class="responsive-logo" style="width: 200px; ">
                        </div>
                        {{-- <h1>Hello, Friend!</h1> --}}
                        <p>{{ __('Enter your personal details to use all of site features') }}</p>
                        <button class="hidden" id="register">{{ __('Forgot Password') }}</button>
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
