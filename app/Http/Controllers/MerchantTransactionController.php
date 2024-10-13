<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Requests\StoreMerchantTransactionRequest;
use App\Http\Requests\UpdateMerchantTransactionRequest;
use App\Services\MerchantTransactionService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class MerchantTransactionController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = (new MerchantTransactionService);
    }

    public function index(): View
    {
        return view('pages.merchant.transaction.index');
    }

    public function create(): View
    {
        return view('pages.merchant.transaction.create');
    }

    public function store(StoreMerchantTransactionRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());
        return redirect()->back()->withSuccess('Transaction Created Successfully!');
    }

    public function edit(Transaction $transaction): View
    {
        return view('pages.merchant.transaction.edit', compact('transaction'));
    }

    public function update(UpdateMerchantTransactionRequest $request, Transaction $transaction): RedirectResponse
    {
        $this->service->update($request->validated(), $transaction);
        return redirect()->back()->withSuccess('Transaction Updated Successfully!');
    }
}
