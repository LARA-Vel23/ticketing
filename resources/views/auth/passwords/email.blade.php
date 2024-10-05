@extends('layouts.app2')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body{
            background-color: #c9d6ff;
            background: linear-gradient(to right, #e2e2e2, #c9d6ff);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
        }

        .container{
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
            position: relative;
            overflow: hidden;
            width: 700px;
            max-width: 100%;
            min-height: 400px;
            padding: 20px;
            margin: 20px;
        }

    </style>
    <div class="container" id="container">
        <div class="d-flex pt-3" style="height:100%; align-items: start; justify-content: center;">
            <div class="col-8">
                <div class="d-flex justify-content-center flex-column">
                    <div class="fw-bold" style="font-size:2em;">
                        Forgot your
                    </div>
                    <div class="fw-bold" style="font-size:2em;">
                        Password?
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <img src="{{url('/images/forgotpassword.png')}}" alt="logo" class="responsive-logo" style="width: 200px; height:100%;">
                </div>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="d-flex flex-column align-items-center justify-content-center py-3">
                        <input
                            id="email"
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email"
                            value="{{ old('email') }}"
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
                        <div class="pt-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
