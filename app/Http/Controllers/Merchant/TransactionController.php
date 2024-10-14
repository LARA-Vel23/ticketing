<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request): View
    {
        $transactions = Transaction::query()
                    ->merchant(auth()->id())
                    ->processed()
                    ->filter($request->all())
                    ->orderByDesc('id')
                    ->paginate(
                        $request->limit
                        ? $request->limit
                        : 10
                    );
        return view('pages.merchant.transaction.index', compact('transactions'));
    }
}
