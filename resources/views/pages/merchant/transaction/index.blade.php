@extends('layouts.app')

@section('content')
    <div class="col-12">
        {{-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-3" style="font-size: 0.7rem;">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0);">{{ __('Home') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="javascript:void(0);">{{ __('Library') }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ __('Data') }}
                </li>
            </ol>
        </nav> --}}
        <div class="rounded-0 shadow-sm bg-white">
            <div class="d-flex flex-column gap-3 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="poppins-semibold mb-0">{{ __('Transactions') }}</h4>
                    <div>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Export" href="#?{{ http_build_query(request()->all()) }}" class="btn btn-success align-self-center">
                            <i class="bi bi-filetype-csv"></i>
                        </a>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Print Module" href="javascript:void(0);" class="btn btn-secondary align-self-center">
                            <i class="bi bi-printer"></i>
                        </a>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Filter" href="javascript:void(0);" class="btn btn-primary align-self-center">
                            <i class="bi bi-funnel"></i>
                        </a>
                    </div>
                </div>
                <form class="d-flex flex-column flex-md-row gap-2 justify-content-between align-items-start align-items-md-center">
                    <div>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent" id="Search">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="search" id="search" name="search" onchange="submit()" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="Search" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
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
                </form>
            </div>
            <div class="table-responsive tableFixHead" style="height: 578px;">
                <table class="table table-hover align-middle m-0">
                    <thead>
                        <tr class="d-flex justify-content-center text-uppercase">
                            <th class="col">{{ __('Merchant ID') }}</th>
                            <th class="col">{{ __('Country ID') }}</th>
                            <th class="col">{{ __('Bank ID') }}</th>
                            <th class="col">{{ __('Admin ID') }}</th>
                            <th class="col">{{ __('Bank') }}</th>
                            <th class="col">{{ __('Account Name') }}</th>
                            <th class="col">{{ __('Account Number') }}</th>
                            <th class="col">{{ __('Bank IFSC') }}</th>
                            <th class="col">{{ __('Bank Swift') }}</th>
                            <th class="col">{{ __('Bank Branch') }}</th>
                            <th class="col">{{ __('Bank Branch Code') }}</th>
                            <th class="col">{{ __('Bank Reference') }}</th>
                            <th class="col">{{ __('Reference') }}</th>
                            <th class="col">{{ __('Type') }}</th>
                            <th class="col">{{ __('Status') }}</th>
                            <th class="col">{{ __('Amount') }}</th>
                            <th class="col">{{ __('Remarks') }}</th>
                            <th class="col">{{ __('Notify') }}</th>
                            <th class="col">{{ __('Date Created') }}</th>
                            <th class="col">{{ __('Last Modified') }}</th>
                            <th class="col">{{ __('Manage') }}</th>
                        </tr>
                    </thead>
                  <tbody>
                    @forelse ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->merchant_id }}</td>
                            <td>{{ $transaction->country_id }}</td>
                            <td>{{ $transaction->bank_id }}</td>
                            <td>{{ $transaction->admin_id }}</td>
                            <td>{{ $transaction->bank }}</td>
                            <td>{{ $transaction->account_name }}</td>
                            <td>{{ $transaction->account_number }}</td>
                            <td>{{ $transaction->bank_ifsc }}</td>
                            <td>{{ $transaction->bank_swift }}</td>
                            <td>{{ $transaction->bank_branch }}</td>
                            <td>{{ $transaction->bank_branch_code }}</td>
                            <td>{{ $transaction->bank_reference }}</td>
                            <td>{{ $transaction->reference }}</td>
                            <td>{{ $transaction->type }}</td>
                            <td>{{ $transaction->status }}</td>
                            <td>{{ $transaction->amount }}</td>
                            <td>{{ $transaction->remarks }}</td>
                            <td>{{ $transaction->notify }}</td>
                            <td>{{ $transaction->readable_created_date }}</td>
                            <td>{{ $transaction->readable_updated_date }}</td>
                            <td>
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
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan=7>
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
