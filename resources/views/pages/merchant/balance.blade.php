@extends('layouts.app')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0">
            <li class="breadcrumb-item active">
                <span>{{ __('Balance') }}</span>
            </li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="d-flex flex-column flex-sm-row gap-3 align-items-center mb-4">
        <div class="card card-body w-100">
            <div>{{ __('Pending Balance') }}</div>
            <div class="display-5">{{ number_format($balance, 2, '.', ',') }}</div>
            <div class="text-muted mt-3 text-center text-sm-end" style="font-size: 0.8em;">
                {{ __('This balance includes pending transaction requests as processed') }}
            </div>
        </div>
        <div class="card card-body w-100">
            <div>{{ __('Available Balance') }}</div>
            <div class="display-5">{{ number_format($balance, 2, '.', ',') }}</div>
            <div class="text-muted mt-3 text-center text-sm-end" style="font-size: 0.8em;">
                {{ __('This balance is the amount ready for settlement') }}
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">{{ __('Date') }}</th>
                    <th scope="col">{{ __('Reference') }}</th>
                    <th scope="col">{{ __('Bank') }}</th>
                    <th scope="col">{{ __('Amount') }}</th>
                    <th scope="col">{{ __('Remarks') }}</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($transactions as $transaction)
                    <tr>
                        <td scope="row">{{ $transaction->updated_at }}</td>
                        <td>{{ $transaction->reference }}</td>
                        <td>{{ $transaction->bank->name }}</td>
                        <td>{{ number_format($transaction->amount, 2, '.', ',') }}</td>
                        <td>{{ $transaction->remarks }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan=5>
                            <div class="d-flex justify-content-center align-items-center" style="height: 500px;">
                                <div class="text-muted text-center">{{ __('No Resource Found') }}</div>
                            </div>
                        </td>
                    </tr>
                @endforelse
              </tbody>
        </table>
    </div>
@endsection
