<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Services\PermissionService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PermissionController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = (new PermissionService);
    }

    public function index(): View
    {
        return view('pages.admin.permission.index');
    }

    public function create(): View
    {
        return view('pages.admin.permission.create');
    }

    public function store(StorePermissionRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());
        return redirect()->back()->withSuccess('Permission Created Successfully!');
    }

    public function edit(Permission $permission): View
    {
        return view('pages.admin.permission.edit', compact('permission'));
    }

    public function update(UpdatePermissionRequest $request, Permission $permission): RedirectResponse
    {
        $this->service->update($request->validated(), $permission);
        return redirect()->back()->withSuccess('Permission Updated Successfully!');
    }
}
