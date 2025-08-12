<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Http\Requests\StoreBankRequest;
use App\Http\Requests\UpdateBankRequest;
use App\Services\BankService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BankController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = (new BankService);
    }

    public function index(): View
    {
        return view('pages.admin.bank.index');
    }

    public function create(): View
    {
        return view('pages.admin.bank.create');
    }

    public function store(StoreBankRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());
        return redirect()->back()->withSuccess('Bank Created Successfully!');
    }

    public function edit(Bank $bank): View
    {
        return view('pages.admin.bank.edit', compact('bank'));
    }

    public function update(UpdateBankRequest $request, Bank $bank): RedirectResponse
    {
        $this->service->update($request->validated(), $bank);
        return redirect()->back()->withSuccess('Bank Updated Successfully!');
    }
}
