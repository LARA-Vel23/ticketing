@extends('layouts.app')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0">
            <li class="breadcrumb-item">
                <a href="{{ route('currency.index') }}">{{ __('Currency') }}</a>
            </li>
            <li class="breadcrumb-item active">
                <span>{{ __('New') }}</span>
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
                <form action="{{ route('currency.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">{{ __('Name') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('name') is-invalid @enderror
                                {{ !$errors->has('name') && old('name') ? 'is-valid' : '' }}
                            "
                            id="name"
                            name="name"
                            name="{{ old('name') }}"
                            placeholder=""
                        />
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="user">{{ __('Merchant') }}</label>
                        <select
                            class="form-control
                                @error('user') is-invalid @enderror
                                {{ !$errors->has('user') && old('user') ? 'is-valid' : '' }}
                            "
                            id="user"
                            name="user"
                        >
                            <option value="">{{ __('Select') }}</option>
                            @foreach (\App\Models\User::isMerchant()->get() as $user)
                                <option
                                    value="{{ $user->id }}"
                                    @selected($user->id == old('user'))
                                >{{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user')
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
                            {{ __('Submit') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
