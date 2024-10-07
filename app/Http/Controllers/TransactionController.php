<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TransactionController extends Controller
{
    private $limit = 10;
    public function index(): View
    {
        $transactions = Transaction::query()
            // ->where('is_admin', 0)
            // ->search(request()->get('search'))
            // ->filterStatus(request()->get('status'))
            // ->latest()
            ->paginate(request()->get('limit') ? request()->get('limit') : $this->limit);
        return view('pages.merchant.transaction.index', compact('transactions'));
    }

    public function create(): View
    {
        return view('pages.merchant.transaction.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        return redirect()->back()->withSuccess('Module Created Successfully!');
    }

    public function show(Transaction $transaction): View
    {
        return view('pages.admin.admin.show', compact('data'));
    }

    public function edit(Transaction $transaction): View
    {
        return view('pages.admin.admin.edit', compact('data'));
    }

    public function update(UpdateUserRequest $request, Transaction $transaction): RedirectResponse
    {
        return redirect()->back()->withSuccess('Module Updated Successfully!');
    }

    public function destroy(Transaction $transaction): RedirectResponse
    {
        $transaction->delete();
        return redirect()->back()->withSuccess('Module Deleted Successfully!');
    }
}
