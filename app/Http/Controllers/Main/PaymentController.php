<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Services\Payments\Thawani;
use Illuminate\Support\Facades\Session;
use App\Services\Delivery\Dotman;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function store() {
        $payment_id = Session::get('payment_id');
        $session_id = Session::get('session_id');
        if (!$payment_id && !$session_id) {
            abort(404); 
        } else {
            $payment = Payment::findOrFail($payment_id);
            if ($payment->reference_id == $session_id) {
                $client = new Thawani(config('services.thawani.secret_key'), config('services.thawani.publishable_key'), 'test');
                // $delivery_order = new Dotman(config('services.product_delivery.api'));
                // $data = [
                //     "name" => Auth::guard('web')->user()->userable->name,
                //     "phone" => Auth::guard('web')->user()->phone,
                //     "region_id" => $payment->order->region_id,
                //     "address" => $payment->order->address,
                //     "cod" => 0,
                //     "order_id" => $payment->order->id,
                //     "ecom_ref_no" => "oazricom"
                // ];
                
                try {
                    $response = $client->getCheckoutSession($session_id);
                    if ($response['data']['payment_status'] == 'paid') {
                        $payment->update([
                            'status' => 'success',
                        ]);
                        // $delivery_order = $delivery_order->createOrder($data);
                        // // update order delivery ref id for the api 
                        // $order = Order::findOrFail($payment->order->id);
                        // $order->update([
                        //     'delivery_ref_id' => $delivery_order['data']['ref_no']
                        // ]);
                        Session::forget('payment_id');
                        Session::forget('session_id');
                        return redirect()->to(route('profile.myOrder.orderDetails', $order->id));
                    }
                } catch (\Throwable $th) {
                    throw $th;
                }
            } else {

                abort(404);
            }
        }
        
    }
    public function cancel() {
        $payment_id = Session::get('payment_id');
        $session_id = Session::get('session_id');
        if (!$payment_id && !$session_id) {
            abort(404); 
        } else {
            $payment = Payment::findOrFail($payment_id);
            if ($payment->reference_id == $session_id) {
                $payment->update([
                    'status' => 'failed',
                ]);
            return redirect()->to(route('profile.myOrder'));
            } else {
                abort(404);
            }
        }
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
            'success_url' => route('checkout.payment.complete'),
            'cancel_url' => route('checkout.payment.cancel'),
        ];
        $session_id = $client->createCheckoutSession($data);
        $pay_url = "https://uatcheckout.thawani.om/pay/{$session_id}?key=".config('services.thawani.publishable_key');
        // make payment request
        $payment = Payment::where(['order_id' => $order->id, 'user_id' => Auth::guard('web')->user()->id])->first();
        $payment->update([
            'user_id' => Auth::guard('web')->user()->id,
            'gateway' => 'thawani',
            'reference_id' => $session_id,
            'status' => 'pending',
            'amount' => $order->total,
            'order_id' => $order->id,
        ]);
        Session::put('payment_id', $payment->id);
        Session::put('session_id', $session_id);
        return redirect()->away($pay_url);
    }
}
