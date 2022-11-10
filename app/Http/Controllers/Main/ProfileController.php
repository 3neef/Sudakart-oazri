<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\ReturnProductRequest;
use App\Models\Customer;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Reason;
use App\Models\ReturnedProducts;
use App\Models\User;
use App\Notifications\SmsCodeNotification;
use App\Services\CodesServices;
use App\Services\Delivery\Dotman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::withCount('orders')->where('id', Auth::guard('web')->user()->userable->id)->get();
        return view('main.profile.index')->with(['customer' => $customer]);
    }


    public function myOrder()
    {
        $orders = Order::withCount('newProduct')->where('customer_id', Auth::guard('web')->user()->id)
            ->orderBy('created_at', 'desc')->paginate(20);
        $total = Order::where('customer_id', Auth::guard('web')->user()->id)
            ->where('status', 'delivered')
            ->where('approved', 1)
            ->sum('total');


        return view('main.profile.myOrders')
            ->with([
                'orders' => $orders,
                'total' => $total
            ]);
    }

    public function refunds()
    {
        $orders = DB::table('returned_products')
            ->select(
                'products.en_name',
                'returned_products.id',
                'returned_products.created_at',
                'returned_products.reason',
                'returned_products.status',
                'returned_products.created_at'
            )
            ->leftJoin('orders', 'orders.id', 'returned_products.order_id')
            ->leftJoin('order_products', 'order_products.id', 'returned_products.order_product_id')
            ->leftJoin('products', 'products.id', 'order_products.product_id')
            ->where('orders.customer_id', Auth::guard('web')->user()->userable->id)
            ->orderBy('returned_products.id', 'desc')
            ->paginate(20);
        return view('main.profile.refund')
            ->with(['orders' => $orders]);
    }

    public function orderDetails($id)
    {
        
        $order = Order::findOrFail($id);
        $delivery_order = new Dotman(config('services.product_delivery.api'));
        $delivery = $delivery_order->retrieveOrder($order->delivery_ref_id);
        $reasons = Reason::orderBy('id', 'desc')->get();
        return view('main.profile.orderDetails')
            ->with([
                'order' => $order,
                'reasons' => $reasons,
                'delivery' => $delivery
            ]);
    }


    public function returnProduct(ReturnProductRequest $request)
    {
        $returned = new ReturnedProducts();
        $returned->order_product_id = $request->order_product_id;
        $returned->order_id = $request->order_id;
        $returned->reason = $request->reason_id;
        if ($returned->save()) {
            return response()->json(['success' => true, 'error' => ""]);
        } else {
            return response()->json(['success' => false, 'error' => "Something wrong happend please try a gain"]);
        }
    }

    public function SendOTP(Request $request)
    {
        $user = User::where('phone', $request->phone)->firstOrFail();
        if($user){
            CodesServices::deleteCode($request->phone, 'password reset');
            $code = CodesServices::generate($user, 'password reset');
            //$user->notify(new SmsCodeNotification(__('Your password reset code is ' . $code)));
            return redirect()->route('profile.showVerfiyCode');
        }else {
            return back()->withErrors('No customer information is found with this phone');
        }
       
    }

    public function showVerfiyCode()
    {
        return view('auth.main.showVerfiyCode');
    }

    public function VerfiyCode(Request $request)
    {
        $code = CodesServices::verifyCode($request->code, 'password reset');
        if ($code) {
            return redirect()->route('profile.showResetPassoword', ['phone' => $code->phone]);
        } else {
            return back()->withErrors('Verfiy Code is Invalide');
        }
    }

    public function showResetPassoword(Request $request)
    {
        return view('auth.main.customer-reset-password')->with('request', $request);
    }

    public function passwordReset(Request $request)
    {
        $request->validate([
            'phone' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::findOrFail(Auth::guard('web')->user()->id);
        $status  = $user->update([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ]);

        event(new PasswordReset($user));

        if ($status) {

            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();
            return redirect()->route('login.web')->with('status', 'You have succefully Reset your passport');
        } else {
            back()->withInput($request->only('phone'))
                ->withErrors(['phone' => 'Error happend try a gain']);
        }
    }


    public function showUpdatePassword()
    {
       return view('main.profile.update-password');
    }

    public function updatePassword(Request $request)
    {
        
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $databse_password = Auth::guard('web')->user()->password ;
       
        if (Hash::check($request->current_password,$databse_password)) {
            
            if($request->password === $request->password_confirmation) {
                $user = User::findOrFail(Auth::guard('web')->user()->id);
                $status  = $user->update([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ]);

                event(new PasswordReset($user));

                if ($status) {

                    Auth::guard('web')->logout();

                    $request->session()->invalidate();

                    $request->session()->regenerateToken();
                    return redirect()->route('login.web')->with('status', 'You have succefully updated your passport');
                } else {
                    $request->session()->flash('error','Error happend try a gain');
                    back();
                }
            }else {
                $request->session()->flash('error','New password and confirm password does not match');
                return back();
            }
            
        }else {
            $request->session()->flash('error','Current password does not match our record');
            return back();
        }
        
    }

    public function notifications()
    {
        $notifications = Notification::where('user_id', Auth::guard('web')->user()->id)->orderBy('id', 'desc')->paginate(20);
        return view('main.profile.notification')->with('notifications', $notifications);
    }


    public function readAll()
    {
        $readAll = Notification::where('user_id', Auth::guard('web')->user()->id)->update([
            'is_opened' => 1
        ]);

        return redirect()->route('profile.notifications');
    }
}
