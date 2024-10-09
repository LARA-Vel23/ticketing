@extends('layouts.app')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0">
            <li class="breadcrumb-item active">
                <span>{{ __('Dashboard') }}</span>
            </li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>
        <div class="card-body">
            {{ __('Content') }}
        </div>
    </div>
@endsection
