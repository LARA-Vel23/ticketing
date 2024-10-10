<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Http\Requests\StoreIpRequest;
use App\Http\Requests\UpdateIpRequest;
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
