@extends('layouts.app')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0">
            <li class="breadcrumb-item">
                <a href="{{ route('currency.index') }}">{{ __('Currency') }}</a>
            </li>
            <li class="breadcrumb-item active">
                <span>{{ __('Edit') }}</span>
            </li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="rounded-3 shadow-sm bg-white">
        <div class="card">
            <div class="card-header">
                {{ __('Edit') }}
            </div>
            <div class="card-body">
                <x-form-session />
                <form action="{{ route('currency.update', $currency->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="name">{{ __('Name') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('name') is-invalid @enderror
                                {{ !$errors->has('name') && old('name', $currency->name) ? 'is-valid' : '' }}
                            "
                            id="name"
                            name="name"
                            value="{{ old('name', $currency->name) }}"
                            placeholder=""
                        />
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="code">{{ __('Code') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('code') is-invalid @enderror
                                {{ !$errors->has('code') && old('code', $currency->code) ? 'is-valid' : '' }}
                            "
                            id="code"
                            name="code"
                            value="{{ old('code', $currency->code) }}"
                            placeholder=""
                        />
                        @error('code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="sign">{{ __('Sign') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('sign') is-invalid @enderror
                                {{ !$errors->has('sign') && old('sign', $currency->sign) ? 'is-valid' : '' }}
                            "
                            id="sign"
                            name="sign"
                            value="{{ old('sign', $currency->sign) }}"
                            placeholder=""
                        />
                        @error('sign')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="d-flex gap-2 align-items-center">
                        <a
                            href="{{ route('currency.index') }}"
                            class="btn @session('success') btn-outline-secondary @else btn-outline-danger @endsession"
                        >
                            @session('success') {{ __('Back') }} @else {{ __('Cancel') }} @endsession
                        </a>
                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            {{ __('Save Changes') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
