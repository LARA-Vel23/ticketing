<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Services\TransactionService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class TransactionController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = (new TransactionService);
    }

    public function index(): View
    {
        return view('pages.admin.transaction.index');
    }

    public function create(): View
    {
        return view('pages.admin.transaction.create');
    }

    public function store(StoreTransactionRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());
        return redirect()->back()->withSuccess('Transaction Created Successfully!');
    }

    public function edit(Transaction $transaction): View
    {
        return view('pages.admin.transaction.edit', compact('transaction'));
    }

    public function update(UpdateTransactionRequest $request, Transaction $transaction): RedirectResponse
    {
        $this->service->update($request->validated(), $transaction);
        return redirect()->back()->withSuccess('Transaction Updated Successfully!');
    }
}
