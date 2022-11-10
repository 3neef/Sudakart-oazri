<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompleteCustomerRegistrationRequest;
use App\Http\Requests\CompleteVendorRegistrationRequest;
use App\Http\Requests\RegisterCustomerRequest;
use App\Models\Customer;
use App\Models\User;
use App\Models\Vendor;
use App\Services\CodesServices;
use App\Services\ShopsServices;
use App\Services\UsersServices;
use App\Services\WalletServices;
use Illuminate\Support\Facades\DB;

class RegisterCustomerController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  RegisterCustomerRequest  $request
     * @return mixed
     */
    public function register(RegisterCustomerRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $customer = Customer::create($request->validated());
            $customer->wallet()->create();
            $user =  UsersServices::create($customer, $request);
            if ($user) {
                return DB::transaction(function () use ($request, $user) {
                    return (new LoginController())->login($request);
                });
            }
            return response([
                'message' => __('Something went wrong during sign up') 
            ]);
        });
    }

    /**
     * complete vendor registration
     *
     * @param  RegisterCustomerRequest  $request
     * @return mixed
     */
    public function completeRegistration (CompleteCustomerRegistrationRequest $request) {
        $user = User::where('phone', $request->phone)->first();
        // return dd($user);
        if ($user) {
            return DB::transaction(function () use ($request, $user) {
                $customer = Customer::find($user->userable_id);
                $customer->update($request->validated());
                // UsersServices::addEmail($customer, $request);
                // UsersServices::addPassword($customer, $request);
                // CodesServices::deleteCode($user->phone);
                return (new LoginController())->login($request);
            });
        }
        return response([
            'message' => __('there is no user with the entered credentials') 
        ]);
    }


}
