@extends('layouts.app')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0">
            <li class="breadcrumb-item">
                <a href="{{ route('ip.index') }}">{{ __('IP Address') }}</a>
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
                <form action="{{ route('ip.update', $ip->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="value">{{ __('Value') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('value') is-invalid @enderror
                                {{ !$errors->has('value') && old('value', $ip->value) ? 'is-valid' : '' }}
                            "
                            id="value"
                            name="value"
                            value="{{ old('value', $ip->value) }}"
                            placeholder=""
                        />
                        @error('value')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="user">{{ __('Merchant') }}</label>
                        <select
                            class="form-control
                                @error('user') is-invalid @enderror
                                {{ !$errors->has('user') && old('user', $ip->user_id) ? 'is-valid' : '' }}
                            "
                            id="user"
                            name="user"
                        >
                            <option value="">{{ __('Select') }}</option>
                            @foreach (\App\Models\User::isMerchant()->get() as $user)
                                <option
                                    value="{{ $user->id }}"
                                    @selected($user->id == old('user', $ip->user_id))
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
                            href="{{ route('ip.index') }}"
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
