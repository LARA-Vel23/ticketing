<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class MerchantController extends Controller
{

    private $limit = 10;
    public function index(): View
    {
        $merchants = User::query()
            ->where('is_admin', 0)
            ->search(request()->get('search'))
            ->filterStatus(request()->get('status'))
            ->latest()
            ->paginate(request()->get('limit') ? request()->get('limit') : $this->limit);
        return view('pages.admin.merchant.index', compact('merchants'));
    }

    public function create(): View
    {
        return view('pages.admin.admin.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        return redirect()->back()->withSuccess('Module Created Successfully!');
    }

    public function show(User $user): View
    {
        return view('pages.admin.admin.show', compact('data'));
    }

    public function edit(User $user): View
    {
        return view('pages.admin.admin.edit', compact('data'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        return redirect()->back()->withSuccess('Module Updated Successfully!');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->back()->withSuccess('Module Deleted Successfully!');
    }
}
