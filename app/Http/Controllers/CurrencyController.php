<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Services\CurrencyService;
use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CurrencyController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = (new CurrencyService);
    }

    public function index(): View
    {
        return view('pages.admin.currency.index');
    }

    public function create(): View
    {
        return view('pages.admin.currency.create');
    }

    public function store(StoreCurrencyRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());
        return redirect()->back()->withSuccess('Currency Created Successfully!');
    }

    public function edit(Currency $currency): View
    {
        return view('pages.admin.currency.edit', compact('ip'));
    }

    public function update(UpdateCurrencyRequest $request, Currency $currency): RedirectResponse
    {
        $this->service->update($request->validated(), $currency);
        return redirect()->back()->withSuccess('Currency Updated Successfully!');
    }
}
