<?php

namespace App\Http\Controllers\Admin;

use App\Collections\TransactionsCollection;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionsResource;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function payments(Request $request)
    {
        $perPage = $request->limit  ? $request->limit : 10;
        $payments = Transaction::where('type', 'payment')->orderBy('created_at', 'desc')->paginate($perPage);
        return view('panel.accounting.payments', compact('payments'));
    }

    public function transactions(Request $request)
    {
        $transactions = TransactionsResource::collection(TransactionsCollection::collection($request));
        return view('panel.accounting.transactions', compact('transactions'));
    }

    public function wallets(Request $request)
    {
        $perPage = $request->limit  ? $request->limit : 10;
        if (Auth::user() != null && Auth::user()->userable_type == 'App\Models\Vendor') {
            $wallet = auth()->user()->userable->wallet->balance;
            $wallets = (object) array('total_balance' => $wallet);
            $transactions = Transaction::where('wallet_id', auth()->user()->userable->wallet->id)->get()->take(5);
            return view('panel.accounting.wallets', compact(['wallets', 'transactions']));
        }else {
        
            $wallets = Wallet::where('accountable_type', 'App\Models\Vendor')->get();
            return view('panel.accounting.wallets', compact('wallets'));
        }
    }

    public function wallethistory(Wallet $wallet)
    {
        $transactions = Transaction::where('wallet_id', $wallet->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('panel.wallets.history', compact('transactions'));
    }

    public function walletsoperation(Wallet $wallet)
    {
        return view('panel.wallets.operation', compact('wallet'));
    }


}
