<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositRequest;
use App\Http\Requests\TopUpRequest;
use App\Http\Requests\WithdarwRequest;
use App\Models\Payment;
use App\Models\User;
use App\Models\Wallet;
use App\Services\Payments\Thawani;
use App\Services\WalletServices;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{

    public function index(Request $request)
    {
        $perPage = $request->limit  ? $request->limit : 50;
        if (Auth::user() != null && Auth::user()->userable_type == 'App\Models\Admin') {
            $wallets = Wallet::where('id', '!=', '')->paginate($perPage);
            return $wallets;
        }else {
            $wallet = auth()->user()->userable->wallet->balance;
            return (object) array('total_balance' => $wallet);
        }
    }

    /**
     * depoist .
     *
     * @param  DepositRequest  $request
     * @return mixed
     */
    public function deposit(DepositRequest $request)
    {
        // dd($request);
        $wallet = User::findOrFail($request->user_id)->userable->wallet;
        WalletServices::deposit($wallet, $request->amount, $request->notes, null, null);
        if (! $request->expectsJson()) {
            return redirect()->back();
        }
        return response(['message' => __('deposit done successfully')]);
    }

    /**
     * withdraw .
     *
     * @param  WithdarwRequest  $request
     * @return mixed
     */
    public function withdraw (WithdarwRequest $request)
    {
        $wallet = User::findOrFail($request->user_id)->userable->wallet;
        WalletServices::withdraw($wallet, $request->amount, $request->notes, null, null);
        if (! $request->expectsJson()) {
            return redirect()->back();
        }
        return response(['message' => __('withdraw done successfully')]);
    }


    public function TopUp (TopUpRequest $request)
    {
        if($request->user_id == null){
            $user_id = Auth::user()->id;
        }else{
            $user_id = $request->user_id;
        }
        if($request->notes == null){
            $notes = 'Top-UP';
        }else{
            $notes = $request->notes;
        }

        //order payment
                $data = [
                    'client_reference_id' => 'top-up',
                    'mode' => 'payment',
                    'products' => [
                        [
                            'name' => 'top-up',
                            'unit_amount' => 1 * $request->amount,
                            'quantity' => 1,
                        ],
                    ],
                    'success_url' => route('api.payment.top.success', [$user_id, $request->amount]),
                    'cancel_url' => route('api.payment.top.cancel', $user_id),
                ];
                
                try {
                    // get payment client
                    $client = new Thawani(config('services.thawani.secret_key'), config('services.thawani.publishable_key'), 'test');
                    $session_id = $client->createCheckoutSession($data);
                    
                    $pay_url = "https://uatcheckout.thawani.om/pay/{$session_id}?key=".config('services.thawani.publishable_key');
                    // make payment request
                    $payment = Payment::forceCreate([
                        'user_id' => Auth::guard('api')->user()->id,
                        'gateway' => 'thawani',
                        'reference_id' => $session_id,
                        'status' => 'pending',
                        'amount' => $request->amount,
                        'wallet_id' => Auth::guard('api')->user()->userable->wallet->id
                    ]);
                    // dd($pay_url);
                    return response()->json(array('payment_url' => $pay_url));
                } catch (Exception $e) {
                    return $e;
                }

        return response(['message' => __('Top up done successfully')]);
    }




}
