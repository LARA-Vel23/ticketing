<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Http\Requests\Merchant\StoreBankRequest;
use App\Http\Requests\Merchant\UpdateBankRequest;
use App\Services\Merchant\BankService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class MBankController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = (new BankService);
    }

    public function index(): View
    {
        return view('pages.merchant.bank.index');
    }

    public function create(): View
    {
        return view('pages.merchant.bank.create');
    }

    public function store(StoreBankRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());
        return redirect()->back()->withSuccess('Bank Created Successfully!');
    }

    public function edit($id): View|RedirectResponse
    {

        if ($this->isBankUsedInTransaction($id)) {
            return redirect()->route('bank.index')->withErrors(['bank_id' => 'This bank cannot be updated.']);
        }

        $bank = Bank::findOrFail($id);
        return view('pages.merchant.bank.edit', compact('bank'));
    }

    public function update(UpdateBankRequest $request, Bank $bank): RedirectResponse
    {
        $this->service->update($request->validated(), $bank);
        return redirect()->back()->withSuccess('Bank Updated Successfully!');
    }

    private function isBankUsedInTransaction($bankId): bool
    {
        return \App\Models\Transaction::where('bank_id', $bankId)->exists();
    }
}
