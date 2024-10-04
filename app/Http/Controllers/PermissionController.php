<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PermissionController extends Controller
{
   public function index(): View
    {
        return view('pages.module.index', compact('data'));
    }

    public function create(): View
    {
        return view('pages.module.create');
    }

    public function store(StorePermissionRequest $request): RedirectResponse
    {
        return redirect()->back()->withSuccess('Module Created Successfully!');
    }

    public function show(Permission $permission): View
    {
        return view('pages.module.show', compact('data'));
    }

    public function edit(Permission $permission): View
    {
        return view('pages.module.show', compact('data'));
    }

    public function update(UpdatePermissionRequest $request, Permission $permission): RedirectResponse
    {
        return redirect()->back()->withSuccess('Module Updated Successfully!');
    }

    public function destroy(Permission $permission): RedirectResponse
    {
        return redirect()->back()->withSuccess('Module Deleted Successfully!');
    }
}
