<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RoleController extends Controller
{
    private $limit = 10;
    public function index(): View
    {
        // dd(Permission::all());
        $roles = Role::query()
            // ->search(request()->get('search'))
            // // ->filterStatus(request()->get('status'))
            // ->latest()
            ->paginate(request()->get('limit') ? request()->get('limit') : $this->limit);
        return view('pages.admin.roles.index', compact('roles'));
    }

    public function create(): View
    {
        return view('pages.module.create');
    }

    // public function store(StoreRoleRequest $request): RedirectResponse
    // {
    //     return redirect()->back()->withSuccess('Module Created Successfully!');
    // }

    // public function show(Role $role): View
    // {
    //     return view('pages.module.show', compact('data'));
    // }

    // public function edit(Role $role): View
    // {
    //     return view('pages.module.show', compact('data'));
    // }

    // public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    // {
    //     return redirect()->back()->withSuccess('Module Updated Successfully!');
    // }

    public function destroy(Role $role): RedirectResponse
    {
        return redirect()->back()->withSuccess('Module Deleted Successfully!');
    }
}
