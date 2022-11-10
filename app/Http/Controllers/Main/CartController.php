<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\DeliveryMethod;
use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class CartController extends Controller
{

    public function index()
    {
        
        $cart = Cart::content();
        
        //Cart::destroy();
        return view('main.cart.index')->with(['cart' => $cart]);
    }


    public function addTocart(Request $request)
    {
       
        $product = Product::findOrFail($request->product_id);
        $price = $product->price;
        if($this->getDiscount($request->product_id)){
            $price = $product->price - ($product->price * $this->getDiscount($request->product_id) );
        }
        Cart::add(
            $product->id,
            $product->name,
            1,
            $price,
            $product->shop_id 
        );
        $cart = Cart::content();
    
        
        return response()->json($cart);
        
    }

    public function addTocartWithOptions(Request $request)
    {
        
        $product = Product::findOrFail($request->product_id);
        $price = $product->price;
        if($this->getDiscount($request->product_id)){
            $price = $product->price - ($product->price * $this->getDiscount($request->product_id) );
        }
        $options = [];
        
        if($request->has('options')){

            if(count($request->options) > 0){

                
                foreach ($request->options as $key => $value) {
                    if($value){
                        $op = $product->getIncrement($value);
                        array_push($options,  ['product_option_id' => $op->product_option_id,]);
    
                        $price += $product->getIncrement($value)->increment;
                    }
                   
                }
            }
        }
       
        Cart::add(
            $product->id,
            $product->name,
            (integer)$request->quantity,
            $price,
            $product->shop_id ,
            $options
        );       
        
    }


    public function updateCart(Request $request)
    {
        $rowId = $request->rowId;
        $cart = Cart::get($rowId);
        $product = Product::findOrFail($cart->id);
        Cart::update($rowId,$request->quantity);
        return response()->json($cart);
    }


    public function checkout(Request $request, Http $http)
    {
        $data = [
            'key' => env('PRODUCT_DELIVERY')
        ];
        $url = 'https://hood.dotoman.net/api/regions' . '?' . http_build_query($data);
        $response = Http::contentType("application/json")->bodyFormat('json')->post($url, [
            'body' => 'FETCH....'
        ])->json();
        $regions = $response['data']['regions'];
        $shippings = DeliveryMethod::all();
        $cart = Cart::content();
        if( $cart_count = Cart::content()->count() > 0){
        return view('main.checkout.index')
        ->with([
            'shippings' => $shippings,
            'cart' => $cart,
            'regions' => $regions
        ]);
        }else {
           return  redirect()->route('home.web');
        }
    }

    public function applyCoupon(Request $request)
    {
        if(Cart::discount() == 0){
            $result = Coupon::couponExiests($request->coupon);
            $testArray = [];
            $cart = Cart::content();
            $info = "";
            if($result){
                foreach ($cart as $product) {
                    $response = Coupon::couponMatch($request->coupon,$product->weight);
                if($response->count() > 0){
                        $discount = $response->first()->discount * 100;
                        $c = Cart::get($product->rowId);
                        $c->setDiscountRate($discount);
                        $info = $response->first()->id;
                        array_push($testArray,1);
                }
                }
            if(count($testArray) == 0) {
                return response()->json(['success' => 0 ,'error' => 'invalid coupon']);
            }else {
                return response()->json([
                    'success' => 1 ,
                    'error' => "" ,
                    'id' => $info 
                ]);
                $request->session()->put('coupon','coupon');
            }
            }else {
                return response()->json(['success' => 0 ,'error' => 'invalid coupon']);
            }
        }else {
            return response()->json(['success' => 0 ,'error' => 'You all ready used a coupon on this order']);
        }

   
        
    }


    public function OrderPlaced($id)
    {
        $order = Order::findOrFail($id);
        return view('main.cart.order')->with('order',$order);
    }


    public function getDiscount($id)
    {
        $discount = DB::table('product_offers as pf')
                    ->select('s.discount')
                    ->leftJoin('offers as s','pf.offer_id','s.id')
                    ->leftJoin('products as p','pf.product_id','p.id')
                    ->where('s.expire_at','>=',today())
                    ->where('p.stop',0)
                    ->where('p.id',$id)
                    ->first();

         if($discount){
            $result = $discount->discount;
        }else {
            $result = 0;
        }
        return $result;
    }

    
}
