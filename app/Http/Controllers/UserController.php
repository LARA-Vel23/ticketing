<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
   public function index(): View
    {
        $users = User::paginate(10);
        return view('pages.admin.admin.index', compact('users'));
    }

    public function create(): View
    {
        return view('pages.module.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        return redirect()->back()->withSuccess('Module Created Successfully!');
    }

    public function show(User $user): View
    {
        return view('pages.module.show', compact('data'));
    }

    public function edit(User $user): View
    {
        return view('pages.module.show', compact('data'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        return redirect()->back()->withSuccess('Module Updated Successfully!');
    }

    public function destroy(User $user): RedirectResponse
    {
        return redirect()->back()->withSuccess('Module Deleted Successfully!');
    }
}
