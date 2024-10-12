@extends('layouts.app')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0">
            <li class="breadcrumb-item active">
                <span>{{ __('Transaction') }}</span>
            </li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="rounded-3 shadow-sm bg-white">
        <div class="card">
            <div class="card-header">
                {{ __('Transaction') }}
            </div>
            <div class="card-body">
                <livewire:merchanttransaction-table />
            </div>
        </div>
    </div>
@endsection
