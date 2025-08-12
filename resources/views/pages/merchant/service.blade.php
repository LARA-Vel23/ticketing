@extends('layouts.app')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0">
            <li class="breadcrumb-item active">
                <span>{{ __('Service') }}</span>
            </li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="d-flex flex-column flex-sm-row gap-3 align-items-center mb-4">
        <div class="card card-body w-100">
            <livewire:service-form />
        </div>
        <div class="card card-body w-100">

        </div>
    </div>

@endsection
