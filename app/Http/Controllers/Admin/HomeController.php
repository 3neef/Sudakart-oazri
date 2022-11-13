<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Expense;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Payment;
use App\Models\Product;
use App\Models\ReturnedProducts;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Wallet;
use App\Traits\ReportsTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Js;

class HomeController extends Controller
{
    use ReportsTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admin = User::where('userable_type', 'App\Models\Admin')->first();
        $admin->assignRole('Admin');
        $user = Auth::user();

        if ($user->userable_type != 'App\Models\Admin' && $user->userable_type == 'App\Models\Vendor') {
            $user->assignRole('Vendor');
        }

        if (in_array('Vendor', $user->getRoleNames()->toArray())){
                $total_products = Product::where('shop_id', auth()->user()->userable->shop->id);
                $products = $total_products->count();
                $total_sales = OrderProduct::where('shop_id', auth()->user()->userable->shop->id)->get();
                $sales = $total_sales->count();
                $total_transactions = Payment::where(['vendor_id' => Auth::user()->id, 'status' => 'success'])->sum('amount');
                $total_commition = [];
                $total_wallets = Wallet::count('id');
                $total_vendors = Vendor::count('id');
                $total_commition = $this->getTotalCommition($total_sales);
                $Ysales = $this->getYesterdaySales($total_sales);
                // =====================================================
                $vendor = $this->getVendor();
                $ordersProduct  = $this->getOrderProduct($vendor);
                $orders = Order::whereIn('id',$ordersProduct)->orderBy('created_at', 'desc')->get();
                $Yorders = $this->getYesterdayOrders($orders);
                // =====================================================
                $sub = Transaction::where('wallet_id', auth()->user()->userable->wallet->id)->where('type', 'withdraw')->sum('amount');
                        // =====================================================

                $now = Carbon::now();

                $f = today()->startOfWeek(Carbon::SATURDAY);
                $l = today()->endOfWeek(Carbon::FRIDAY);
                $ll = today()->endOfWeek(Carbon::FRIDAY)->subWeek();
                $fl = today()->startOfWeek(Carbon::SATURDAY)->subWeek();
                $this_week =  Order::whereBetween('created_at', [$f,$l ])->whereIn('id',$ordersProduct)->select(
                    DB::raw('sum(amount) as total_sales'),
                )
                ->get();
                $last_week =  Order::whereBetween('created_at', [$fl,$ll ])->whereIn('id',$ordersProduct)->select(
                    DB::raw('sum(amount) as total_sales'),
                )
                ->get();

                $shop_id = Auth::user()->userable->shop->id;
                $last_orders = $orders->take(5);
                $returned_products = ReturnedProducts::whereHas('product', function($e){
                    $e->where('shop_id',  Auth::user()->userable->shop->id);
                })->get();

                $r_products = $returned_products->take(5);
                // sales graph
                $SalesMonthlyGraph =  $this->getSalesMonthlyGraph($ordersProduct);
                // expenses graph
                $expensesGraph = $this->getExpenseMonthlyGraph();  
                // return products graph
                $returnedProductGraph =  $this->getReturnedProductGraph();

                $stats = (object) array('total_products' => $products,
                'total_Sales' => $sales,
                'total_revenue' => $orders->where('approved', 1)->sum('amount'),
                'total_orders' => $orders->count(),
                'total_earned' => $orders->where('approved', 1)->sum('amount') - $sub,
                'todays_sales' =>$total_sales->where('created_at', '>=', today())->count() ,
                'todays_orders' => $orders->where('created_at', '>=', today())->count(),
                'yesterday_sales' => $Ysales,
                'yesterday_orders' =>$Yorders,
                'monthly' => $SalesMonthlyGraph,
                'this_week' => $this_week,
                'last_week' => $last_week,
                'SalesMonthlyGraph' => $SalesMonthlyGraph,
                'total_commition' => $total_commition,
                'total_transactions' => $total_transactions,
                'total_wallets' => $total_wallets,
                'total_vendors' => $total_vendors,
                'expensesGraph' => $expensesGraph,
                'returnedProductGraph' => $returnedProductGraph,
                );

            } elseif(in_array('Admin', $user->getRoleNames()->toArray())) {
                $total_products = Product::get();
                $products = $total_products->count();
                $total_sales = OrderProduct::get();
                $sales = $total_sales->count();
                $total_transactions = Payment::sum('amount');
                $total_commition = [];
                $total_wallets = Wallet::count('id');
                $total_vendors = Vendor::count('id');
                $total_commition = $this->getTotalCommition($total_sales);
                $Ysales = $this->getYesterdaySales($total_sales);
                 // =====================================================
                 $vendor = $this->getVendor();
                
                 $ordersProduct  = $this->getOrderProduct($vendor);
                 $orders = Order::whereIn('id',$ordersProduct)->orderBy('created_at', 'desc')->get();
                 $Yorders = $this->getYesterdayOrders($orders);
                 // =====================================================
                 $sub = Transaction::where('type', 'withdraw' && 'type', 'withdraw' )->sum('amount');
                // =====================================================
 
                 $now = Carbon::now();
 
                 $f = today()->startOfWeek(Carbon::SATURDAY);
                 $l = today()->endOfWeek(Carbon::FRIDAY);
                 $ll = today()->endOfWeek(Carbon::FRIDAY)->subWeek();
                 $fl = today()->startOfWeek(Carbon::SATURDAY)->subWeek();
                 $this_week =  Order::whereBetween('created_at', [$f,$l ])->whereIn('id',$ordersProduct)->select(
                     DB::raw('sum(amount) as total_sales'),
                 )
                 ->get();
                 $last_week =  Order::whereBetween('created_at', [$fl,$ll ])->whereIn('id',$ordersProduct)->select(
                     DB::raw('sum(amount) as total_sales'),
                 )
                 ->get();
 
                 $last_orders = $orders->take(5);
                 $returned_products = ReturnedProducts::get();
 
                 $r_products = $returned_products->take(5);
                 // sales graph
                 $SalesMonthlyGraph =  $this->getSalesMonthlyGraph($ordersProduct);
                 // expenses graph
                 $expensesGraph = $this->getExpenseMonthlyGraph();  
                 // return products graph
                 $returnedProductGraph =  $this->getReturnedProductGraph();
 
                 $stats = (object) array('total_products' => $products,
                 'total_Sales' => $sales,
                 'total_revenue' => $orders->where('approved', 1)->sum('amount'),
                 'total_orders' => $orders->count(),
                 'total_earned' => $orders->where('approved', 1)->sum('amount') - $sub,
                 'todays_sales' =>$total_sales->where('created_at', '>=', today())->count() ,
                 'todays_orders' => $orders->where('created_at', '>=', today())->count(),
                 'yesterday_sales' => $Ysales,
                 'yesterday_orders' =>$Yorders,
                 'monthly' => $SalesMonthlyGraph,
                 'this_week' => $this_week,
                 'last_week' => $last_week,
                 'SalesMonthlyGraph' => $SalesMonthlyGraph,
                 'total_commition' => $total_commition,
                 'total_transactions' => $total_transactions,
                 'total_wallets' => $total_wallets,
                 'total_vendors' => $total_vendors,
                 'expensesGraph' => $expensesGraph,
                 'returnedProductGraph' => $returnedProductGraph,
                 );
            }
        return view('dashboard', compact('stats', 'last_orders', 'r_products'));
    }
}
