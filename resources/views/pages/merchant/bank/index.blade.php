@extends('layouts.app')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0">
            <li class="breadcrumb-item active">
                <span>{{ __('Bank') }}</span>
            </li>
        </ol>
    </nav>

@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
                @endforeach
        </div>
    @endif
    <div class="rounded-3 shadow-sm bg-white">
        <div class="card">
            <div class="card-header">
                {{ __('Bank') }}
            </div>
            <div class="card-body">
                <livewire:merchant.bank-table />
            </div>
        </div>
    </div>
@endsection
