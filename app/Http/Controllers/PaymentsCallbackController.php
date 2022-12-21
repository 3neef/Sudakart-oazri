<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use App\Models\Wallet;
use App\Services\Delivery\Dotman;
use App\Services\Payments\Thawani;
use App\Services\WalletServices;
use Exception;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentsCallbackController extends Controller
{
    public function success(Request $request, $id)
    {
        $order = Order::find($request->id);
        $user = $order->customer->user;

        if (!$order) {
            abort(404);
        }

        $payment = Payment::where(['order_id' => $order->id, 'user_id' => $user->id])->first();
        // dd($payment);
        $session_id = $payment->reference_id;
        if (!$payment) {
            abort(404);
        }


        $client = new Thawani(
            config('services.thawani.secret_key'),
            config('services.thawani.publishable_key'),
            'test'
        );

        try {
            $response = $client->getCheckoutSession($session_id);
            if ($response['data']['payment_status'] == 'paid') {
                $client = new Thawani(config('services.thawani.secret_key'), config('services.thawani.publishable_key'), 'test');
                // $delivery_order = new Dotman(config('services.product_delivery.api'));
                // $data = [
                //     "name" => $user->userable->name,
                //     "phone" => $user->phone,
                //     "region_id" => $order->region_id,
                //     "address" => $order->address,
                //     "cod" => 0,
                //     "order_id" => $payment->order->id,
                //     "ecom_ref_no" => "oazricom"
                // ];
                // dd($data);
                // $delivery_order = $delivery_order->createOrder($data);
                // update order delivery ref id for the api 
                // $order = Order::findOrFail($order->id);
                // $order->update([
                //     'delivery_ref_id' => $delivery_order['data']['ref_no']
                // ]);
                $payment->status = 'success';
                $payment->data = $response;
                $payment->save();

                Session::forget(['payment_id', 'session_id']);

                return Response()->json('Success!');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }


    }

    public function topsuccess(Request $request)
    {
        $wallet = User::findOrFail($request->id)->userable->wallet;
        $notes = 'top up';

        if (!$wallet) {
            abort(404);
        }
        WalletServices::deposit($wallet, $request->amount, $notes, null, null);
        $payment = Payment::where(['wallet_id' => $wallet->id, 'user_id' => $request->id])->first();

        $session_id = $payment->reference_id;
        if (!$payment) {
            abort(404);
        }

        $client = new Thawani(
            config('services.thawani.secret_key'),
            config('services.thawani.publishable_key'),
            'test'
        );

        try {
            $response = $client->getCheckoutSession($session_id);
            if ($response['data']['payment_status'] == 'paid') {
                $payment->status = 'success';
                $payment->data = $response;
                $payment->save();

                Session::forget(['payment_id', 'session_id']);

                return Response()->json('Success! your new balance is '.$wallet->balance);
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }


    }

    public function cancel()
    {
        $payment_id = Session::get('payment_id');
        $session_id = Session::get('session_id');
        if (!$payment_id && !$session_id) {
            abort(404);
        }

        $payment = Payment::findOrFail($payment_id);
        if ($payment->reference_id !== $session_id) {
            abort(404);
        }

        $payment->status = 'failed';
        $payment->save();

        dd('Failed!');
    }
    public function topcancel(Request $request)
    {
        $wallet = User::findOrFail($request->id)->userable->wallet;
        $notes = 'top up';

        if (!$wallet) {
            abort(404);
        }
        $payment = Payment::where(['wallet_id' => $wallet->id, 'user_id' => $request->id])->first();
        
        if (!$payment) {
            abort(404);
        }
        $payment->status = 'failed';
        $payment->save();

        return Response()->json('failed! your balance is '.$wallet->balance);
    }

    public function payNow(Request $request) {
        $client = new Thawani(config('services.thawani.secret_key'), config('services.thawani.publishable_key'), 'test');
        $order = Order::findOrFail($request->id);
        $data = [
            'client_reference_id' => 'order-'.$order->id,
            'mode' => 'payment',
            'products' => [
                [
                    'name' => 'order-'.$order->id,
                    'unit_amount' => 1 * $order->total,
                    'quantity' => 1,
                ],
            ],
            'success_url' => route('api.payment.success', $order->id),
            'cancel_url' => route('api.payment.cancel', $order->id),
        ];
        $session_id = $client->createCheckoutSession($data);
        $pay_url = "https://uatcheckout.thawani.om/pay/{$session_id}?key=".config('services.thawani.publishable_key');
        // make payment request
        $payment = Payment::where(['order_id' => $order->id, 'user_id' => Auth::guard('api')->user()->id])->first();
        if(!$payment){
            $payment = Payment::Create([
                'user_id' => Auth::guard('api')->user()->id,
                'gateway' => 'thawani',
                'reference_id' => $session_id,
                'status' => 'pending',
                'amount' => $order->total,
                'order_id' => $order->id,
            ]);
        }else{
            $payment->update([
                'user_id' => Auth::guard('api')->user()->id,
                'gateway' => 'thawani',
                'reference_id' => $session_id,
                'status' => 'pending',
                'amount' => $order->total,
                'order_id' => $order->id,
            ]);
        }
        
        return response()->json(array('payment_url' => $pay_url));
    }
}
