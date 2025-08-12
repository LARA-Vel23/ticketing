@extends('layouts.app')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0">
            <li class="breadcrumb-item">
                <a href="{{ route('transaction.index') }}">{{ __('Transaction') }}</a>
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
                <form action="{{ route('transaction.update', $transaction->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="merchant_id">{{ __('Merchant ID') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('merchant_id') is-invalid @enderror
                                {{ !$errors->has('merchant_id') && old('merchant_id') ? 'is-valid' : '' }}
                            "
                            id="merchant_id"
                            name="merchant_id"
                            value="{{ old('merchant_id', $transaction->merchant_id) }}"
                            placeholder=""
                        />
                        @error('merchant_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="country_id">{{ __('Country ID') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('country_id') is-invalid @enderror
                                {{ !$errors->has('country_id') && old('country_id') ? 'is-valid' : '' }}
                            "
                            id="country_id"
                            name="country_id"
                            value="{{ old('country_id') }}"
                            placeholder=""
                        />
                        @error('country_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="bank_id">{{ __('Bank ID') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('bank_id') is-invalid @enderror
                                {{ !$errors->has('bank_id') && old('bank_id') ? 'is-valid' : '' }}
                            "
                            id="bank_id"
                            name="bank_id"
                            value="{{ old('bank_id', $transaction->bank_id) }}"
                            placeholder=""
                        />
                        @error('bank_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="admin_id">{{ __('Admin ID') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('admin_id') is-invalid @enderror
                                {{ !$errors->has('admin_id') && old('admin_id') ? 'is-valid' : '' }}
                            "
                            id="admin_id"
                            name="admin_id"
                            value="{{ old('admin_id', $transaction->admin_id) }}"
                            placeholder=""
                        />
                        @error('admin_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="bank">{{ __('Bank') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('bank') is-invalid @enderror
                                {{ !$errors->has('bank') && old('bank') ? 'is-valid' : '' }}
                            "
                            id="bank"
                            name="bank"
                            value="{{ old('bank', $transaction->bank) }}"
                            placeholder=""
                        />
                        @error('bank')
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
                            value="{{ old('account_name', $transaction->account_name) }}"
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
                            value="{{ old('account_number', $transaction->account_number) }}"
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
                            value="{{ old('bank_ifsc', $transaction->bank_ifsc) }}"
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
                            value="{{ old('bank_swift', $transaction->bank_swift) }}"
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
                            value="{{ old('bank_branch', $transaction->bank_branch) }}"
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
                            value="{{ old('bank_branch_code', $transaction->bank_branch_code) }}"
                            placeholder=""
                        />
                        @error('bank_branch_code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="bank_reference">{{ __('Bank Reference') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('bank_reference') is-invalid @enderror
                                {{ !$errors->has('bank_reference') && old('bank_reference') ? 'is-valid' : '' }}
                            "
                            id="bank_reference"
                            name="bank_reference"
                            value="{{ old('bank_reference', $transaction->bank_reference) }}"
                            placeholder=""
                        />
                        @error('bank_reference')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="reference">{{ __('Reference') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('reference') is-invalid @enderror
                                {{ !$errors->has('reference') && old('reference') ? 'is-valid' : '' }}
                            "
                            id="reference"
                            name="reference"
                            value="{{ old('reference', $transaction->reference) }}"
                            placeholder=""
                        />
                        @error('reference')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="type">{{ __('Type') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('type') is-invalid @enderror
                                {{ !$errors->has('type') && old('type') ? 'is-valid' : '' }}
                            "
                            id="type"
                            name="type"
                            value="{{ old('type', $transaction->type) }}"
                            placeholder=""
                        />
                        @error('type')
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
                            <option value="1" @selected('status' == 1)>{{ __('Active') }}</option>
                            <option value="2" @selected('status' == 0)>{{ __('Deactivated') }}</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="amount">{{ __('Amount') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('amount') is-invalid @enderror
                                {{ !$errors->has('amount') && old('amount') ? 'is-valid' : '' }}
                            "
                            id="amount"
                            name="amount"
                            value="{{ old('amount', $transaction->amount) }}"
                            placeholder=""
                        />
                        @error('amount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="remarks">{{ __('Remarks') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('remarks') is-invalid @enderror
                                {{ !$errors->has('remarks') && old('remarks') ? 'is-valid' : '' }}
                            "
                            id="remarks"
                            name="remarks"
                            value="{{ old('remarks', $transaction->remarks) }}"
                            placeholder=""
                        />
                        @error('remarks')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="notify">{{ __('Notify') }}</label>
                        <input
                            type="text"
                            class="form-control
                                @error('notify') is-invalid @enderror
                                {{ !$errors->has('notify') && old('notify') ? 'is-valid' : '' }}
                            "
                            id="notify"
                            name="notify"
                            value="{{ old('notify', $transaction->notify) }}"
                            placeholder=""
                        />
                        @error('notify')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="d-flex gap-2 align-items-center">
                        <a
                            href="{{ route('transaction.index') }}"
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
