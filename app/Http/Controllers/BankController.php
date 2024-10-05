<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BankController extends Controller
{
    private $limit = 10;
    public function index(): View
    {
        $banks = Bank::query()
            // ->where('is_admin', 0)
            // ->search(request()->get('search'))
            // ->filterStatus(request()->get('status'))
            // ->latest()
            ->paginate(request()->get('limit') ? request()->get('limit') : $this->limit);
        return view('pages.merchant.bank.index', compact('banks'));
    }

    public function create(): View
    {
        return view('pages.merchant.bank.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        return redirect()->back()->withSuccess('Module Created Successfully!');
    }

    public function show(Bank $bank): View
    {
        return view('pages.admin.admin.show', compact('data'));
    }

    public function edit(Bank $bank): View
    {
        return view('pages.admin.admin.edit', compact('data'));
    }

    public function update(UpdateUserRequest $request, Bank $bank): RedirectResponse
    {
        return redirect()->back()->withSuccess('Module Updated Successfully!');
    }

    public function destroy(Bank $bank): RedirectResponse
    {
        $bank->delete();
        return redirect()->back()->withSuccess('Module Deleted Successfully!');
    }
}
