<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;

class BalanceController extends Controller
{
    public function index(Request $request): View
    {
        $balance = Transaction::query()
                    ->merchant(auth()->id())
                    ->processed()
                    ->sum('amount');
        $transactions = Transaction::query()
                    ->merchant(auth()->id())
                    ->processed()
                    ->paginate(5);
        return view(
            'pages.merchant.balance',
            compact('balance', 'transactions')
        );
    }
}
