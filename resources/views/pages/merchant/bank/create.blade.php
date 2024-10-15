@extends('layouts.app')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0">
            <li class="breadcrumb-item">
                <a href="{{ route('bank.index') }}">{{ __('Bank') }}</a>
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
                <form action="{{ route('bank.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="user_id">{{ __('User ID') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('user_id') is-invalid @enderror
                                {{ !$errors->has('user_id') && old('user_id') ? 'is-valid' : '' }}
                            "
                            id="user_id"
                            name="user_id"
                            value="{{ old('user_id') }}"
                            placeholder=""
                        />
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
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
                        <label for="account_name">{{ __('Account Name') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('account_name') is-invalid @enderror
                                {{ !$errors->has('account_name') && old('account_name') ? 'is-valid' : '' }}
                            "
                            id="account_name"
                            name="account_name"
                            value="{{ old('account_name') }}"
                            placeholder=""
                        />
                        @error('account_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="account_number">{{ __('Account Number') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('account_number') is-invalid @enderror
                                {{ !$errors->has('account_number') && old('account_number') ? 'is-valid' : '' }}
                            "
                            id="account_number"
                            name="account_number"
                            value="{{ old('account_number') }}"
                            placeholder=""
                        />
                        @error('account_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="bank_ifsc">{{ __('Bank IFSC') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('bank_ifsc') is-invalid @enderror
                                {{ !$errors->has('bank_ifsc') && old('bank_ifsc') ? 'is-valid' : '' }}
                            "
                            id="bank_ifsc"
                            name="bank_ifsc"
                            value="{{ old('bank_ifsc') }}"
                            placeholder=""
                        />
                        @error('bank_ifsc')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="bank_swift">{{ __('Bank Swift') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('bank_swift') is-invalid @enderror
                                {{ !$errors->has('bank_swift') && old('bank_swift') ? 'is-valid' : '' }}
                            "
                            id="bank_swift"
                            name="bank_swift"
                            value="{{ old('bank_swift') }}"
                            placeholder=""
                        />
                        @error('bank_swift')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="bank_branch">{{ __('Bank Branch') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('bank_branch') is-invalid @enderror
                                {{ !$errors->has('bank_branch') && old('bank_branch') ? 'is-valid' : '' }}
                            "
                            id="bank_branch"
                            name="bank_branch"
                            value="{{ old('bank_branch') }}"
                            placeholder=""
                        />
                        @error('bank_branch')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="bank_branch_code">{{ __('Bank Branch Code') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('bank_branch_code') is-invalid @enderror
                                {{ !$errors->has('bank_branch_code') && old('bank_branch_code') ? 'is-valid' : '' }}
                            "
                            id="bank_branch_code"
                            name="bank_branch_code"
                            value="{{ old('bank_branch_code') }}"
                            placeholder=""
                        />
                        @error('bank_branch_code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="d-flex gap-2 align-items-center">
                        <a
                            href="{{ route('bank.index') }}"
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
