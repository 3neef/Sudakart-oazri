<?php

namespace App\Models;

use App\Traits\HasUuid;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vendor extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'first_name',
        'last_name',
        'secondary_phone',
        'bank_name',
        'account_number',
        'account_holder_name',
        'branch',
        'approved',
        'type',
        'suspended'
    ];

    public function user () {
        return $this->morphOne(User::class, 'userable');
    }

    public function shop () {
        return $this->hasOne(Shop::class);
    }

    public function wallet () {
        return $this->morphOne(Wallet::class, 'accountable');
    }

    public function transactions () {
        return $this->morphMany(Transaction::class, 'operator');
    }

    protected function getCountAttribute() {
        if ($this->shop){
            $count = $this->shop->products->count();
            return $count;
        }else{
            return 0;
        }
    }
    protected function getStatisticsAttribute() {
        $total_products = Product::where('shop_id', auth()->user()->userable->shop->id);
        $products = $total_products->count();
        $total_sales = OrderProduct::where('shop_id', auth()->user()->userable->shop->id)->get();
        $sales = $total_sales->count();

        $Ysales = 0;
        foreach ($total_sales as $sale) {
            $date = $sale->created_at->todatestring();
            if($date == Carbon::yesterday()->todatestring()){
                $Ysales++;
            }
        }
        // =====================================================
        $vendor =  Vendor::where('id',auth()->user()->userable->id)->first();
        $ordersProduct  = OrderProduct::where('shop_id', $vendor->shop->id)
        ->where('status', 'pending')
        ->with('product','order')
        ->distinct('order_id')
        ->pluck('order_id');
        $orders = Order::whereIn('id',$ordersProduct)->orderBy('created_at', 'desc')->get();
        $Yorders = 0;
        foreach ($orders as $order) {
            $date = $order->created_at->todatestring();
            if($date == Carbon::yesterday()->todatestring()){
                $Yorders++;
            }
        }
        // =====================================================
        $sub = Transaction::where('wallet_id', auth()->user()->userable->wallet->id)->where('type', 'withdraw' && 'type', 'withdraw' )->sum('amount');
                // =====================================================

        $now = Carbon::now();
        $monthly =  Order::whereIn('id',$ordersProduct)->select(
            DB::raw('sum(amount) as total_sales'),
            DB::raw("DATE_FORMAT(created_at,'%m %Y') as month")
        )
        ->groupBy('month')
        ->get();
        $yearly =  Order::whereIn('id',$ordersProduct)->select(
            DB::raw('sum(amount) as total_sales'),
            DB::raw("DATE_FORMAT(created_at,'%Y') as year")
        )
        ->groupBy('year')
        ->get();
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



        return (object) array('total_products' => $products,
        'total_Sales' => $sales,
        'total_revenue' => $orders->where('approved', 1)->sum('amount'),
        'total_orders' => $orders->count(),
        'total_earned' => $orders->where('approved', 1)->sum('amount') - $sub,
        'todays_sales' =>$total_sales->where('created_at', '>=', today())->count() ,
        'todays_orders' => $orders->where('created_at', '>=', today())->count(),
        'yesterday_sales' => $Ysales,
        'yesterday_orders' =>$Yorders,
        'monthly' => $monthly,
        'yearly' => $yearly,
        'this_week' => $this_week,
        'last_week' => $last_week,
    );
    }
}
