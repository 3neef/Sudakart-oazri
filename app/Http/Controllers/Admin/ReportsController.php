<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\ExpenseType;
use App\Models\OrderProduct;
use App\Models\Shop;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sales()
    {
        $vendors = Vendor::pluck('first_name', 'id');
        return view('panel.reports.sales.request', compact('vendors'));
    }

    public function salesindex(Request $request)
    {
        $shops = Shop::whereIn('vendor_id', $request->vendors)->pluck('id');
        $products = OrderProduct::whereIn('shop_id', $shops)
        ->whereRaw('Date(created_at) between ? and ?',[$request->date_from,$request->date_to])
        ->paginate(10);
        // dd($products->first()->total);
        $vendors = Vendor::pluck('first_name', 'id');
        return view('panel.reports.sales.index')
            ->with([
                'products' => $products ,
                'vendors' => $vendors,
            ]);
    }

    public function wallets()
    {
        $vendors = Vendor::pluck('first_name', 'id');
        return view('panel.reports.wallets.request', compact('vendors'));
    }

    public function walletsindex(Request $request)
    {
        $wallets = Wallet::whereIn('accountable_id', $request->vendors)->where('accountable_type', 'App\Models\Vendor')->pluck('id');
        $transactions = Transaction::whereIn('wallet_id', $wallets)
        ->whereRaw('Date(created_at) between ? and ?',[$request->date_from,$request->date_to])
        ->paginate(10);
        $vendors = Vendor::pluck('first_name', 'id');
        return view('panel.reports.wallets.index', compact('transactions'))
        ->with([
            'transactions' => $transactions ,
            'vendors' => $vendors,
        ]);
    }
    
    public function commissions()
    {
        $vendors = Vendor::pluck('first_name', 'id');
        return view('panel.reports.commissions.request', compact('vendors'));
    }

    public function commissionsindex(Request $request)
    {
        $wallets = Wallet::whereIn('accountable_id', $request->vendors)->where('accountable_type', 'App\Models\Vendor')->pluck('id');
        $transactions = Transaction::whereIn('wallet_id', $wallets)
        ->where('type', 'withdraw')
        ->whereRaw('Date(created_at) between ? and ?',[$request->date_from,$request->date_to])
        ->paginate(10);
        $vendors = Vendor::pluck('first_name', 'id');
        return view('panel.reports.commissions.index', compact('transactions'))
        ->with([
            'transactions' => $transactions ,
            'vendors' => $vendors,
        ]);
    }

    public function expenses()
    {
        $types = ExpenseType::pluck('name', 'id');
        return view('panel.reports.expenses.request', compact('types'));
    }

    public function expensesindex(Request $request)
    {
        $expenses = Expense::whereIn('expense_type_id', $request->types)
        ->whereRaw('Date(created_at) between ? and ?',[$request->date_from,$request->date_to])
        ->paginate(10);
        $types = ExpenseType::pluck('name', 'id');
        return view('panel.reports.expenses.index', compact('expenses'))
        ->with([
            'expenses' => $expenses ,
            'types' => $types 
        ]);
    }

    public function profit()
    {
        $year = '';
        $years = range(2019, strftime("%Y", time()));
        $monthes = ['January', 'February', 'March', 'April', 'May', 'June', 'July','August', 'September', 'October', 'November', 'December'];
        $expenses =  Expense::select(
            DB::raw('sum(price) as total_expenses'),
            DB::raw("DATE_FORMAT(expense_date,'%M') as month")
        )
        ->groupBy('month')
        ->get();

        $commissions = Transaction::where('type', 'withdraw')
        ->select(
            DB::raw('sum(amount) as total_commissions'),
            DB::raw("DATE_FORMAT(created_at,'%M') as month")
        )
        ->groupBy('month')
        ->get();
        return view('panel.reports.profit.index', compact(['monthes', 'expenses', 'commissions', 'years', 'year']));
    }

    public function profitByYear(Request $request)
    {
        $year = $request->year;
        $years = range(2019, strftime("%Y", time()));
        $monthes = ['January', 'February', 'March', 'April', 'May', 'June', 'July','August', 'September', 'October', 'November', 'December'];
        $expenses =  Expense::whereYear('created_at', '=', $year)->select(
            DB::raw('sum(price) as total_expenses'),
            DB::raw("DATE_FORMAT(expense_date,'%M') as month")
        )
        ->groupBy('month')
        ->get();

        $commissions = Transaction::whereYear('created_at', '=', $year)->where('type', 'withdraw')
        ->select(
            DB::raw('sum(amount) as total_commissions'),
            DB::raw("DATE_FORMAT(created_at,'%M') as month")
        )
        ->groupBy('month')
        ->get();
        return view('panel.reports.profit.index', compact(['monthes', 'expenses', 'commissions', 'years', 'year']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
