<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompleteVendorRegistrationRequest;
use App\Http\Requests\RegisterCustomerRequest;
use App\Http\Requests\RegisterVendorRequest;
use App\Http\Requests\UpdateVendorRequest;
use App\Models\Category;
use App\Models\User;
use App\Models\Vendor;
use App\Services\CodesServices;
use App\Services\ShopsServices;
use App\Services\UsersServices;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class RegisterVendorController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  RegisterCustomerRequest  $request
     * @return mixed
     */
    public function register(RegisterVendorRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $vendor = Vendor::create($request->validated());
            $vendor->wallet()->create();
            $user = UsersServices::create($vendor, $request);

            if (! $request->expectsJson()) {

                return redirect()->route('admin.complete-register.vendor', $vendor->id);
            }
            return $user;
        });
    }

    /**
     * complete vendor registration
     *
     * @param  RegisterCustomerRequest  $request
     * @return mixed
     */
    public function completeRegistration (CompleteVendorRegistrationRequest $request) {
        // dd($request->shop_categories);
        $user = User::where('phone', $request->phone)->where('email', $request->email)->first();
        if ($user) {
            return DB::transaction(function () use ($request, $user) {
                $vendor = Vendor::find($user->userable_id);
                $vendor->update($request->validated());
                ShopsServices::create($vendor, $request);
                UsersServices::addPassword($vendor, $request);
                // CodesServices::deleteCode($user->phone);
                if (! $request->expectsJson()) {
                    return redirect()->route('login.view');
                }
                return (new LoginController())->login($request);
            });
        }
        return response([
            'message' => __('there is no user with the entered credentials')
        ]);
    }

    public function completepage(Request $request){
        $categories = Category::pluck('name', 'id');
        return view('auth.complete-register', compact('categories'));
    }

    public function stats(){
        $pro = Vendor::findorfail(auth()->user()->userable_id);
        return $pro->statistics;
    }

    public function update(UpdateVendorRequest $request, Vendor $vendor){

        DB::transaction(function () use ($request, $vendor) {
            $vendor->update($request->validated());
            UsersServices::update($vendor, $request);
            if($vendor->shop){
                ShopsServices::update($vendor, $request);
                
            }else{
                ShopsServices::create($vendor, $request);

            }
            if (! $request->expectsJson()) {
                return redirect()->route('admin.vendors');
            }
            // return (new LoginController())->login($request);
        });
        return redirect()->route('admin.vendors');
    }

}
