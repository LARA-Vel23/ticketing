@extends('layouts.app')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0">
            <li class="breadcrumb-item active">
                <span>{{ __('Home') }}</span>
            </li>
            {{-- <li class="breadcrumb-item">
                <a href="{{ route('home') }}">{{ __('Home') }}</a>
            </li>
            <li class="breadcrumb-item">
                <span>{{ __('Theme') }}</span>
            </li>
            <li class="breadcrumb-item active">
                <span>{{ __('Typography') }}</span>
            </li> --}}
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            {{ __('You are logged in!') }}
        </div>
    </div>
@endsection
