<?php

namespace App\Http\Controllers;

use App\Models\IP;
use App\Http\Requests\StoreIpRequest;
use App\Http\Requests\UpdateIpRequest;
use App\Services\IPService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class IpController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = (new IPService);
    }

    public function index(): View
    {
        return view('pages.admin.ip.index');
    }

    public function create(): View
    {
        return view('pages.admin.ip.create');
    }

    public function store(StoreIpRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());
        return redirect()->back()->withSuccess('IP Address Created Successfully!');
    }

    public function edit(IP $ip): View
    {
        return view('pages.admin.ip.edit', compact('ip'));
    }

    public function update(UpdateIpRequest $request, IP $ip): RedirectResponse
    {
        $this->service->update($request->validated(), $ip);
        return redirect()->back()->withSuccess('IP Address Updated Successfully!');
    }
}
