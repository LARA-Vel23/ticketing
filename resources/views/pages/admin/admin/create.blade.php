@extends('layouts.app')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.index') }}">{{ __('Admin') }}</a>
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
                <form action="{{ route('admin.store') }}" method="POST">
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
                            value="{{ old('name') }}"
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
                                {{ !$errors->has('email') && old('email') ? 'is-valid' : '' }}
                            "
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder=""
                        />
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <div>{{ __('Role') }}</div>
                        @foreach (\App\Models\Role::all() as $role)
                            <div class="mb-2 form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    name="role[]"
                                    id="role{{ $role->id }}"
                                    value="{{ $role->id }}"
                                >
                                <label
                                    class="form-check-label"
                                    for="role{{ $role->id }}"
                                >{{ $role->name }}
                                </label>
                            </div>
                        @endforeach
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- <div class="form-group mb-3">
                        <label for="role">{{ __('Role') }}</label>
                        <select
                            class="form-control
                                @error('role') is-invalid @enderror
                                {{ !$errors->has('role') && old('role') ? 'is-valid' : '' }}
                            "
                            id="role"
                            name="role"
                        >
                            <option value="">{{ __('Select') }}</option>
                            @foreach (\App\Models\Role::all() as $role)
                                <option
                                    value="{{ $role->id }}"
                                    @selected($role->id == old('role'))
                                >{{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> --}}
                    <br>
                    <div class="d-flex gap-2 align-items-center">
                        <a
                            href="{{ route('admin.index') }}"
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
