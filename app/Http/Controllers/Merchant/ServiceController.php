<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;
use Illuminate\Contracts\View\View;

class ServiceController extends Controller
{
    public function index(Request $request): View
    {
        $bank = Bank::query()
                    ->merchant(auth()->id())
                    ->processed()
                    ->get('amount');
        return view(
            'pages.merchant.balance',
            compact('balance', 'transactions')
        );
    }
}
