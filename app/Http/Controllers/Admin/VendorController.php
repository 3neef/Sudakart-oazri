<?php

namespace App\Http\Controllers\Admin;

use App\Collections\CategoryRequestCollection;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterAdminRequest;
use App\Models\Admin;
use App\Models\Category;
use App\Models\CategoryRequest;
use App\Models\Customer;
use App\Models\Driver;
use App\Models\Vendor;
use App\Services\UsersServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;
use Spatie\Permission\Models\Role;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::all();
        return view('panel.vendors.index', compact('vendors'));
    }
    public function suspend(Request $request, Vendor $vendor)
    {
        $products = $vendor->shop->products;
        DB::transaction(function () use ($vendor, $products) {
            if ($vendor->suspended == 1) {
                $vendor->update([
                    'suspended' => 0
                ]);
                foreach ($products as $product) {
                    $product->update(['stop' => 0]);
                }
            
            }else{
                $vendor->update([
                    'suspended' => 1
                ]);
                foreach ($products as $product) {
                    $product->update(['stop' => 1]);
                }
            }
        });

            return redirect()->back();
    }
    public function approved(Request $request, Vendor $vendor)
    {
        // dd($vendor);
        if ($vendor->approved == 1) {
            $vendor->update([
                'approved' => 0
            ]);
        
        }else{
            $vendor->update([
                'approved' => 1
            ]);
        }
        return redirect()->back();
    }
    public function suspended()
    {
        $vendors = Vendor::where('suspended', 1)->get();
        return view('panel.vendors.suspended', compact('vendors'));
    }
    public function requestcategory()
    {
        $categories = Category::pluck('en_name', 'id');
        return view('panel.vendors.categories.create', compact('categories'));
    }
    public function pendingCategories(Request $request)
    {
        $perPage = $request->limit  ? $request->limit : 10;
        $categories = CategoryRequest::paginate($perPage);
        return view('panel.vendors.categories.index', compact('categories'));
    }

    public function approvedcategory(Request $request, $id)
    {
        $categoryRequest = CategoryRequest::findOrFail($id);
        $categoryRequest->update(['approved' => 1]);
        if ($categoryRequest->approved == true) {
            DB::table('shop_categories')->insert(
                array(
                    'shop_id' => $categoryRequest->shop_id, 
                    'category_id' => $categoryRequest->category_id
                    )
                );
                
            }
            return redirect()->back();
    }
    public function pending()
    {
        $vendors = Vendor::where('approved', 0)->get();
        return view('panel.vendors.pending', compact('vendors'));
    }
    public function customers()
    {
        $customers = Customer::all();
        return view('panel.vendors.customers.index', compact('customers'));
    }
    public function vipcustomers()
    {
        $customers = Customer::whereHas('orders')->get();
        $all_customers = [];
        Foreach ($customers as $customer) {
            if ($customer->orders->count() >= 5) {
                $all_customers[]  = $customer;
            }
        }
        // dd($all_customers);
        return view('panel.vendors.customers.vip', compact('all_customers'));
    }

    public function users()
    {
        $admins =  Admin::all();
        return view('admin.users.index', compact('admins'));
    }

    public function drivers()
    {
        $drivers =  Driver::all();
        return view('panel.drivers.index', compact('drivers'));
    }

    public function admincreate()
    {
        $roles =  Role::pluck('name');
        return view('admin.users.create', compact('roles'));
    }

    public function drivercreate()
    {
        $vichels = ['motor', 'car', 'mini van', 'van', 'truck'];
        return view('panel.drivers.create', compact('vichels'));
    }

    public function adminstore(RegisterAdminRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $admin = Admin::create($request->validated());
            $user = UsersServices::create($admin, $request);
            if(!$request->role == null){
                $user->assignRole($request->role);
            }

            return redirect()->route('admin.users');
        });
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
    public function edit(Vendor $vendor)
    {
        // dd($vendor->shop);
        $categories = Category::pluck('name', 'id');
        return view('panel.vendors.edit', compact('vendor', 'categories'));
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
