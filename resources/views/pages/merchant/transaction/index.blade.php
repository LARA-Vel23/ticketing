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
    <style>
        @media screen and (min-width: 576px) {
            .modal-dialog {
                margin-right: 0 !important;
                margin-top: 0 !important;
                margin-bottom: 0
            }
        }
    </style>
    <div class="d-flex flex-column gap-3">
        <div class="rounded-3 shadow-sm bg-white">
            <div class="d-flex justify-content-between align-items-center p-3">
                <div>
                    <div class="input-group">
                        <span class="input-group-text bg-transparent">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="search" id="reference" name="reference" onchange="submit()" class="form-control" placeholder="Reference" aria-label="reference" aria-describedby="reference" value="{{ isset($_GET['reference']) ? $_GET['reference'] : '' }}">
                        <span class="input-group-text bg-secondary" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#filterModal">
                            <i class="bi bi-gear text-light"></i>
                        </span>
                    </div>
                </div>
                <div>
                    <select name="limit" id="limit" class="form-select" onchange="submit()">
                        <option value="10" @selected(isset($_GET['limit']) && $_GET['limit'] == 10 ? true : false)>10</option>
                        <option value="25" @selected(isset($_GET['limit']) && $_GET['limit'] == 25 ? true : false)>25</option>
                        <option value="50" @selected(isset($_GET['limit']) && $_GET['limit'] == 50 ? true : false)>50</option>
                        <option value="75" @selected(isset($_GET['limit']) && $_GET['limit'] == 75 ? true : false)>75</option>
                        <option value="100" @selected(isset($_GET['limit']) && $_GET['limit'] == 100 ? true : false)>100</option>
                    </select>
                </div>
            </div>
            <div class="table-responsive tableFixHead">
                <table class="table table-hover align-middle m-0">
                    <thead>
                        <tr class="text-uppercase" >
                            <th class="col" style="font-size:0.6em;">{{ __('Reference') }}</th>
                            <th class="col" style="font-size:0.6em;">{{ __('Currency') }}</th>
                            <th class="col" style="font-size:0.6em;">{{ __('Bank') }}</th>
                            <th class="col" style="font-size:0.6em;">{{ __('Customer') }}</th>
                            <th class="col" style="font-size:0.6em;">{{ __('Bank Reference') }}</th>
                            <th class="col" style="font-size:0.6em;">{{ __('Type') }}</th>
                            <th class="col" style="font-size:0.6em;">{{ __('Amount') }}</th>
                            <th class="col" style="font-size:0.6em;">{{ __('Status') }}</th>
                            <th class="col" style="font-size:0.6em;">{{ __('Remarks') }}</th>
                            <th class="col" style="font-size:0.6em;">{{ __('Date Requested') }}</th>
                            <th class="col" style="font-size:0.6em;">{{ __('Date Processed') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->reference }}</td>
                                <td>{{ $transaction->country->currency->code }}</td>
                                <td>{{ $transaction->bank->name }}</td>
                                <td>
                                    {{ $transaction->bank }} <br>
                                    {{ $transaction->account_name }} <br>
                                    {{ $transaction->account_number }} <br>
                                    {{ $transaction->bank_ifsc }} <br>
                                    {{ $transaction->bank_branch }} <br>
                                    {{ $transaction->bank_branch_code }}
                                </td>
                                <td>{{ $transaction->bank_reference }}</td>
                                <td>{{ $transaction->type }}</td>
                                <td>{{ number_format($transaction->amount, 2, '.', ',') }}</td>
                                <td>{{ $transaction->readable_status }}</td>
                                <td>{{ $transaction->remarks }}</td>
                                <td>{{ $transaction->readable_created_date }}</td>
                                <td>{{ $transaction->readable_updated_date }}</td>
                                {{-- <td>
                                    <div class="d-flex justify-content-center gap-3 align-items-center">
                                        <a href="javascript:void(0);" style="font-size: 1.2em;" class="text-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Show Data">
                                            <i class="bi bi-book"></i>
                                        </a>
                                        <a href="javascript:void(0);" style="font-size: 1.2em;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Data">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form method="POST" action="javascript:void(0);" onsubmit="return confirm('Are you sure want to delete this data?')">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-light border border-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Data">
                                                <i class="bi bi-trash2 text-danger"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td> --}}
                            </tr>
                        @empty
                            <tr>
                                <td colspan=11>
                                    <div class="d-flex justify-content-center align-items-center" style="height: 500px;">
                                        <div style="font-size: 1em;" class="text-muted">{{ __('No Resource Found') }}</div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex flex-column flex-md-row gap-2 justify-content-between align-items-center align-items-md-center p-3">
                <div>
                    Showing {{($transactions->currentpage()-1)*$transactions->perpage()+1}} to {{$transactions->currentpage()*$transactions->perpage()}}
                    of  {{$transactions->total()}} entries
                </div>
                {{ $transactions->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection

@push('modals')
    <div class="modal fade modal-sm" id="filterModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="filterModalLabel">{{ __('Filter') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-column gap-3">
                        <div class="row g-3">
                            <div class="form-group col-12 col-sm-12">
                                <label for="currency">{{ __('Currency') }}</label>
                                <select
                                    name="currency"
                                    id="currency"
                                    class="form-select"
                                >
                                    <option value="">{{ __('Select') }}</option>
                                    @foreach (\App\Models\Currency::all() as $currency)
                                        <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12 col-sm-12">
                                <label for="provider">{{ __('Bank') }}</label>
                                <select
                                    name="provider"
                                    id="provider"
                                    class="form-select"
                                >
                                    <option value="">{{ __('Select') }}</option>
                                    @foreach (\App\Models\Bank::all() as $bank)
                                        <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12 col-sm-12">
                                <label for="type">{{ __('Type') }}</label>
                                <select
                                    name="type"
                                    id="type"
                                    class="form-select"
                                >
                                    <option value="">{{ __('Select') }}</option>
                                    <option value="1">{{ __('Deposit') }}</option>
                                    <option value="2">{{ __('Withdrawal') }}</option>
                                </select>
                            </div>
                            <div class="form-group col-12 col-sm-12">
                                <label for="status">{{ __('Status') }}</label>
                                <select
                                    name="status"
                                    id="status"
                                    class="form-select"
                                >
                                    <option value="">{{ __('Select') }}</option>
                                    <option value="1">{{ __('Confirmed') }}</option>
                                    <option value="2">{{ __('Declined') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="form-group col-12 col-sm-12">
                                <label for="bank">{{ __('Customer Bank') }}</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="bank"
                                    id="bank"
                                    placeholder=""
                                />
                            </div>
                            <div class="form-group col-12 col-sm-12">
                                <label for="bank_reference">{{ __('Bank Reference') }}</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="bank_reference"
                                    id="bank_reference"
                                    placeholder=""
                                />
                            </div>
                            <div class="form-group col-12 col-sm-12">
                                <label for="account_name">{{ __('Account Name') }}</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="account_name"
                                    id="account_name"
                                    placeholder=""
                                />
                            </div>
                            <div class="form-group col-12 col-sm-12">
                                <label for="account_number">{{ __('Account Number') }}</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="account_number"
                                    id="account_number"
                                    placeholder=""
                                />
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="form-group col-12 col-sm-12">
                                <label for="request_date_from">{{ __('Date Requested From') }}</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    name="request_date_from"
                                    id="request_date_from"
                                    placeholder=""
                                />
                            </div>
                            <div class="form-group col-12 col-sm-12">
                                <label for="request_date_until">{{ __('Date Requested Until') }}</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    name="request_date_until"
                                    id="request_date_until"
                                    placeholder=""
                                />
                            </div>
                            <div class="form-group col-12 col-sm-12">
                                <label for="processed_date_from">{{ __('Date Processed From') }}</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    name="processed_date_from"
                                    id="processed_date_from"
                                    placeholder=""
                                />
                            </div>
                            <div class="form-group col-12 col-sm-12">
                                <label for="processed_date_until">{{ __('Date Processed Until') }}</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    name="processed_date_until"
                                    id="processed_date_until"
                                    placeholder=""
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-success">
                        <i class="bi bi-file-spreadsheet"></i>
                        {{ __('Export') }}
                    </a>
                    <a href="javascript:void(0);" class="btn btn-primary">
                        {{ __('Search') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endpush
