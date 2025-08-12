<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreMerchantRequest;
use App\Http\Requests\UpdateMerchantRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\MerchantService;


class MerchantController extends Controller
{

    public $service;

    public function __construct()
    {
        $this->service = (new MerchantService);
    }

    public function index(): View
    {
        return view('pages.admin.merchant.index');
    }

    public function create(): View
    {
        return view('pages.admin.merchant.create');
    }

    public function store(StoreMerchantRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());
        return redirect()->back()->withSuccess('Merchant Created Successfully!');
    }
    public function edit(User $merchant): View
    {
        return view('pages.admin.merchant.edit', compact('merchant'));
    }

    public function update(UpdateMerchantRequest $request, User $merchant): RedirectResponse
    {
        $this->service->update($request->validated(), $merchant);
        return redirect()->back()->withSuccess('Module Updated Successfully!');
    }
}
