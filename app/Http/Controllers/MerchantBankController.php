<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Http\Requests\StoreMerchantBankRequest;
use App\Http\Requests\UpdateMerchantBankRequest;
use App\Services\MerchantBankService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class MerchantBankController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = (new MerchantBankService);
    }

    public function index(): View
    {
        return view('pages.merchant.bank.index');
    }

    public function create(): View
    {
        return view('pages.merchant.bank.create');
    }

    public function store(StoreMerchantBankRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());
        return redirect()->back()->withSuccess('Bank Created Successfully!');
    }

    public function edit(Bank $bank): View
    {
        return view('pages.merchant.bank.edit', compact('bank'));
    }

    public function update(UpdateMerchantBankRequest $request, Bank $bank): RedirectResponse
    {
        $this->service->update($request->validated(), $bank);
        return redirect()->back()->withSuccess('Bank Updated Successfully!');
    }
}
