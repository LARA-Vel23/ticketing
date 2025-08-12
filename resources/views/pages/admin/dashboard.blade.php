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
    <div class="px-4">
        <div class="row g-4 mb-4">
            <div class="col-sm-6 col-xl-6">
                <div class="card card-custom text-white border border-secondary shadow">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                            <div data-coreui-i18n="users">Admin</div>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div style="font-size:1.2em;">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </div>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#" data-coreui-i18n="action">Action</a>
                                <a class="dropdown-item" href="#" data-coreui-i18n="anotherAction">Another action</a>
                                <a class="dropdown-item" href="#" data-coreui-i18n="somethingElseHere">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 pb-4 d-flex justify-content-between align-items-center">
                        <div class="fw-semibold" style="font-size:4em;">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div class="fw-semibold" style="font-size:3em;">
                            26 users
                        </div>
                    </div>
                    {{-- <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                        <canvas class="chart" id="card-chart2" height="140" width="760" style="display: block; box-sizing: border-box; height: 70px; width: 380px;"></canvas>
                    </div> --}}
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-xl-6">
                <div class="card card-custom text-white border border-secondary shadow">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                            <div data-coreui-i18n="users">Merchant</div>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div style="font-size:1.2em;">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </div>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#" data-coreui-i18n="action">Action</a>
                                <a class="dropdown-item" href="#" data-coreui-i18n="anotherAction">Another action</a>
                                <a class="dropdown-item" href="#" data-coreui-i18n="somethingElseHere">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 pb-4 d-flex justify-content-between align-items-center">
                        <div class="fw-semibold" style="font-size:4em;">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div class="fw-semibold" style="font-size:3em;">
                            26 users
                        </div>
                    </div>
                    {{-- <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                        <canvas class="chart" id="card-chart2" height="140" width="760" style="display: block; box-sizing: border-box; height: 70px; width: 380px;"></canvas>
                    </div> --}}
                </div>
            </div>

        </div>
        <div class="row g-4 mb-4">
            <div class="col-sm-6 col-xl-3">
            <div class="card card-custom text-white border border-secondary shadow">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                <div>
                    <div class="fs-5 fw-semibold">26K <span class="fs-6 fw-normal">
                        (-12.4%
                            <i class="bi bi-arrow-up"></i>
                        )</span></div>
                    <div data-coreui-i18n="users">Fund</div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div style="font-size:1.2em;">
                            <i class="bi bi-three-dots-vertical"></i>
                        </div>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#" data-coreui-i18n="action">Action</a><a class="dropdown-item" href="#" data-coreui-i18n="anotherAction">Another action</a><a class="dropdown-item" href="#" data-coreui-i18n="somethingElseHere">Something else here</a></div>
                </div>
                </div>
                <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                <canvas class="chart" id="card-chart1" height="140" width="760" style="display: block; box-sizing: border-box; height: 70px; width: 380px;"></canvas>
                </div>
            </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-xl-3">
            <div class="card card-custom text-white border border-secondary shadow">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                <div>
                    <div class="fs-5 fw-semibold">$6.200 <span class="fs-6 fw-normal">(40.9%
                        <i class="bi bi-arrow-up"></i>)</span></div>
                    <div data-coreui-i18n="income">Balance</div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div style="font-size:1.2em;">
                            <i class="bi bi-three-dots-vertical"></i>
                        </div>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#" data-coreui-i18n="action">Action</a><a class="dropdown-item" href="#" data-coreui-i18n="anotherAction">Another action</a><a class="dropdown-item" href="#" data-coreui-i18n="somethingElseHere">Something else here</a></div>
                </div>
                </div>
                <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                <canvas class="chart" id="card-chart2" height="140" width="760" style="display: block; box-sizing: border-box; height: 70px; width: 380px;"></canvas>
                </div>
            </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-xl-3">
            <div class="card card-custom text-white border border-secondary shadow">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                <div>
                    <div class="fs-5 fw-semibold">2.49% <span class="fs-6 fw-normal">(84.7%
                        <i class="bi bi-arrow-up"></i>)</span></div>
                    <div data-coreui-i18n="conversionRate">Conversion Rate</div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div style="font-size:1.2em;">
                            <i class="bi bi-three-dots-vertical"></i>
                        </div>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#" data-coreui-i18n="action">Action</a><a class="dropdown-item" href="#" data-coreui-i18n="anotherAction">Another action</a><a class="dropdown-item" href="#" data-coreui-i18n="somethingElseHere">Something else here</a></div>
                </div>
                </div>
                <div class="c-chart-wrapper mt-3" style="height:70px;">
                <canvas class="chart" id="card-chart3" height="140" width="824" style="display: block; box-sizing: border-box; height: 70px; width: 412px;"></canvas>
                </div>
            </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-xl-3">
            <div class="card card-custom text-white border border-secondary shadow">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                <div>
                    <div class="fs-5 fw-semibold">44K <span class="fs-6 fw-normal">(-23.6%
                        <i class="bi bi-arrow-up"></i>)
                    </span></div>
                    <div data-coreui-i18n="sessions">Sessions</div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div style="font-size:1.2em;">
                            <i class="bi bi-three-dots-vertical"></i>
                        </div>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#" data-coreui-i18n="action">Action</a><a class="dropdown-item" href="#" data-coreui-i18n="anotherAction">Another action</a><a class="dropdown-item" href="#" data-coreui-i18n="somethingElseHere">Something else here</a></div>
                </div>
                </div>
                <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                <canvas class="chart" id="card-chart4" height="140" width="760" style="display: block; box-sizing: border-box; height: 70px; width: 380px;"></canvas>
                </div>
            </div>
            </div>
            <!-- /.col-->
        </div>
    </div>
@endsection
