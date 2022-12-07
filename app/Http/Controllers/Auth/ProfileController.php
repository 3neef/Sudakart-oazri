<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\updateProfileRequest;
use App\Models\User;
use App\Services\UsersServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return mixed
     */
    public function show($id)
    {
        //return auth user if the user is not an admin
        if (auth()->user()->userable_type != 'App\Models\Admin') {
            $id = auth()->id();
        }
        return User::where('id', $id)->with('userable')->firstOrFail();
    }

    public function update(updateProfileRequest $request, $id)
    {
        if (auth()->user() && auth()->user()->userable_type != 'App\Models\Admin') {
            $id = auth()->id();
        }

        $user = User::findOrFail($id);
        $user->userable()->update($request->validated());
        return $user->userable()->with('user')->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePasswordRequest  $request
     * @return mixed
     */
    public function updatePassword (UpdatePasswordRequest $request) {
        if (Hash::check($request->old_password, auth()->user()->password)) {
            auth()->user()->update(['password' => Hash::make($request->new_password)]);
            return response(['message' => __('password has been updated successfully')]);
        }
        response(['message' => __('old password is wrong')], 422);
    }
    
    public function updatePhone (Request $request) {
        if ($request->phone == auth()->user()->phone) {
            return response(['message' => __(' You can not use the old phone number')]);
        }else{
            return DB::transaction(function () use ($request) {
                $user = User::findorfail(auth()->user()->id);
                return  UsersServices::updatePhone($user, $request);
            });
        }
        // response(['message' => __('old password is wrong')], 422);
    }

    public function deactivateaccount(){
        if (Auth::user() != null && Auth::user()->userable_type == 'App\Models\Vendor' || Auth::user() != null && Auth::user()->userable_type == 'App\Models\Customer'){
            Auth::user()->userable->update(['suspended'=> 1 ]);
        }
    }


}
