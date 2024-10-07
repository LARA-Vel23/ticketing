<?php

namespace App\Http\Controllers;

use App\Models\IP;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class IpController extends Controller
{
    private $limit = 10;
    public function index(): View
    {
        $ip_addresses = IP::query()
            // ->where('is_admin', 0)
            // ->search(request()->get('search'))
            // ->filterStatus(request()->get('status'))
            ->latest()
            ->paginate(request()->get('limit') ? request()->get('limit') : $this->limit);
        return view('pages.admin.ip.index', compact('ip_addresses'));
    }

    public function create(): View
    {
        return view('pages.admin.ip.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        return redirect()->back()->withSuccess('Module Created Successfully!');
    }

    public function show(IP $ip): View
    {
        return view('pages.admin.ip.show', compact('data'));
    }

    public function edit(IP $ip): View
    {
        return view('pages.admin.ip.edit', compact('data'));
    }

    public function update(UpdateUserRequest $request, IP $ip): RedirectResponse
    {
        return redirect()->back()->withSuccess('Module Updated Successfully!');
    }

    public function destroy(IP $ip): RedirectResponse
    {
        $ip->delete();
        return redirect()->back()->withSuccess('Module Deleted Successfully!');
    }
}
