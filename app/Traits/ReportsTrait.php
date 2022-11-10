<?php

namespace App\Traits;

use App\Models\Category;
use App\Models\Expense;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\ReturnedProducts;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait ReportsTrait
{
	public function getTotalCommition($total_sales) {
		$total_commition = [];
		foreach ($total_sales as $key => $value) {
			if ($value->product) {
				$category = Category::where('id', $value->product->category_id)->first();
				if ($category) {
					$total_commition[] = (($value->price + $category->commission) - $value->price);
				}
			}
			
		}
		return $total_commition;
	}
	public function getYesterdaySales($total_sales) {
		$Ysales = 0;
		foreach ($total_sales as $sale) {
			$date = $sale->created_at->todatestring();
			if($date == Carbon::yesterday()->todatestring()){
				$Ysales++;
			}
		}
		return $Ysales;
	}
	public function getVendor() {
		return Vendor::with('shop')->where('id',auth()->user()->userable->id)->first();
	}
	public function getOrderProduct($vendor) {
		if (auth()->user()->userable_type == 'App\Models\Vendor') {
			return OrderProduct::where('shop_id', $vendor->shop->id)
                ->where('status', 'pending')
                ->with('product','order')
                ->distinct('order_id')
                ->pluck('order_id');
		} else {
			return OrderProduct::where('status', 'pending')
                ->with('product','order')
                ->distinct('order_id')
                ->pluck('order_id');
		}
		
	}
	public function getYesterdayOrders($orders) {
		$Yorders = 0;
		foreach ($orders as $order) {
			$date = $order->created_at->todatestring();
			if($date == Carbon::yesterday()->todatestring()){
				$Yorders++;
			}
		}
		return $Yorders;
	}
	public function getSalesMonthlyGraph($ordersProduct) {
		$months = $this->getMonths();
		$month = Order::whereIn('id',$ordersProduct)->select(
			DB::raw('sum(amount) as total_sales'),
			DB::raw("DATE_FORMAT(created_at,'%M') as month"),
		)
		->whereYear('created_at', date('Y'))
		->groupBy('month')
		->pluck('total_sales', 'month');
		foreach ($months as $key => $value) {
			if (in_array($value, $month->keys()->toArray())) {
				$data[] = $month[$value];
			} else {
				$data[] = 0;
			}
		}
		return $data;
	}
	public function getExpenseMonthlyGraph() {
		$months = $this->getMonths();
		$month = Expense::select(
			DB::raw('sum(price) as price'),
			DB::raw("DATE_FORMAT(expense_date,'%M') as month")
		)
		->whereYear('expense_date', date('Y'))
		->groupBy('month')
		->pluck('price', 'month'); 
		$data = [];
		foreach ($months as $key => $value) {
			if (in_array($value, $month->keys()->toArray())) {
				$data[] = $month[$value];
			} else {
				$data[] = 0;
			}
		}
		return $data;
	}
	public function getReturnedProductGraph() {
		$months = $this->getMonths();
		$month =  ReturnedProducts::select(
			DB::raw('sum(id) as returned_count'),
			DB::raw("DATE_FORMAT(created_at,'%M') as month")
		)
		->whereYear('created_at', date('Y'))
		->groupBy('month')
		->pluck('returned_count', 'month');  
		$data = [];
		foreach ($months as $key => $value) {
			if (in_array($value, $month->keys()->toArray())) {
				$data[] = $month[$value];
			} else {
				$data[] = 0;
			}
		}
		return $data;
	}
	public function getMonths() {
		return ['January', 'February', 'March', 'April', 'May', 'June', 'July',
		 'August', 'September', 'October', 'November', 'December'];
	}
}