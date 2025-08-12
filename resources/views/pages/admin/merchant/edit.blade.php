@extends('layouts.app')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0">
            <li class="breadcrumb-item">
                <a href="{{ route('merchant.index') }}">{{ __('Merchant') }}</a>
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
                {{ __('New') }}
            </div>
            <div class="card-body">
                <x-form-session />
                <form action="{{ route('merchant.update', $merchant->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="name">{{ __('Name') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('name') is-invalid @enderror
                                {{ !$errors->has('name') && old('name', $merchant->name) ? 'is-valid' : '' }}
                            "
                            id="name"
                            name="name"
                            value="{{ old('name', $merchant->name) }}"
                            placeholder=""
                        />
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">{{ __('Email') }}</label>
                        <input
                            type="email"
                            class="form-control
                                @error('email') is-invalid @enderror
                                {{ !$errors->has('email') && old('email', $merchant->email) ? 'is-valid' : '' }}
                            "
                            id="email"
                            name="email"
                            value="{{ old('email', $merchant->email) }}"
                            placeholder=""
                        />
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="status">{{ __('Status') }}</label>
                        <select
                            class="form-control
                                @error('status') is-invalid @enderror
                                {{ !$errors->has('status') && old('status') ? 'is-valid' : '' }}
                            "
                            id="status"
                            name="status"
                        >
                            <option value="">{{ __('Select') }}</option>
                            <option value="1" @selected($merchant->status == 1)>{{ __('Active') }}</option>
                            <option value="2" @selected($merchant->status == 0)>{{ __('Deactivated') }}</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="d-flex gap-2 align-items-center">
                        <a
                            href="{{ route('merchant.index') }}"
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
