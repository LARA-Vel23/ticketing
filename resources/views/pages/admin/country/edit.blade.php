@extends('layouts.app')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0">
            <li class="breadcrumb-item">
                <a href="{{ route('country.index') }}">{{ __('Role') }}</a>
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
                <form action="{{ route('country.update', $country->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="name">{{ __('Name') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('name') is-invalid @enderror
                                {{ !$errors->has('name') && old('name', $country->name) ? 'is-valid' : '' }}
                            "
                            id="name"
                            name="name"
                            value="{{ old('name', $country->name) }}"
                            placeholder=""
                        />
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="timezone">{{ __('Timezone') }}</label>
                        <select
                            class="form-control
                                @error('timezone') is-invalid @enderror
                                {{ !$errors->has('timezone') && old('timezone', $country->timezone) ? 'is-valid' : '' }}
                            "
                            id="timezone"
                            name="timezone"
                        >
                            <option value="">{{ __('Select') }}</option>
                            @foreach (timezone_identifiers_list() as $timezone)
                                <option
                                    value="{{ $timezone }}"
                                    @selected($timezone == old('timezone', $country->timezone))
                                >{{ $timezone }}
                                </option>
                            @endforeach
                        </select>
                        @error('timezone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="d-flex gap-2 align-items-center">
                        <a
                            href="{{ route('country.index') }}"
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
