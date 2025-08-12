<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Services\RoleService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RoleController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = (new RoleService);
    }

    public function index(): View
    {
        return view('pages.admin.role.index');
    }

    public function create(): View
    {
        return view('pages.admin.role.create');
    }

    public function store(StoreRoleRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());
        return redirect()->back()->withSuccess('Role Created Successfully!');
    }

    public function edit(Role $role): View
    {
        return view('pages.admin.role.edit', compact('role'));
    }

    public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    {
        $this->service->update($request->validated(), $role);
        return redirect()->back()->withSuccess('Role Updated Successfully!');
    }
}
