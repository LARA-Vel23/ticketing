<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = (new UserService);
    }

    public function index(): View
    {
        return view('pages.admin.admin.index');
    }

    public function create(): View
    {
        return view('pages.admin.admin.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());
        return redirect()->back()->withSuccess('Admin Created Successfully!');
    }

    // public function show(User $user): View
    // {
    //     return view('pages.admin.admin.show', compact('data'));
    // }

    public function edit(User $admin): View
    {
        return view('pages.admin.admin.edit', compact('admin'));
    }

    public function update(UpdateUserRequest $request, User $admin): RedirectResponse
    {
        $this->service->update($request->validated(), $admin);
        return redirect()->back()->withSuccess('Admin Updated Successfully!');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->back()->withSuccess('Module Deleted Successfully!');
    }
}
