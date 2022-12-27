<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterDriverRequest;
use App\Http\Requests\CompleteDriverRegisterationRequest;
use App\Models\Driver;
use App\Models\User;
use App\Services\UploadImageServices;
use App\Services\UsersServices;
use App\Services\CodesServices;
use App\Services\ShopsServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterDriverController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  RegisterDriverRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterDriverRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $fields = $request->validated();
            $driver = Driver::create($fields);
            if($request->image){
                $fields['image'] = UploadImageServices::upload($request->file('image'), 'profiles');
            }
            if($request->identity){
            $fields['identity'] = UploadImageServices::upload($request->file('identity'), 'identities');
            }
            $driver->wallet()->create();
            UsersServices::create($driver, $request);
            UsersServices::addPassword($driver, $request);
            return redirect()->route('admin.drivers');
        });
        return redirect()->route('admin.drivers');
    }

    public function completeRegistration (CompleteDriverRegisterationRequest $request) {
        $user = User::where('phone', $request->phone)->first();
        if ($user) {
            return DB::transaction(function () use ($request, $user) {
                $driver = Driver::find($user->userable_id);
                $fields = $request->validated();
                if($request->image){
                    $fields['image'] = UploadImageServices::upload($request->file('image'), 'profiles');
                    $fields['identity'] = UploadImageServices::upload($request->file('identity'), 'identities');
                    
                }
                $driver->update($fields);
                UsersServices::addPassword($driver, $request);
                CodesServices::deleteCode($user->phone);
                return (new LoginController())->login($request);
            });
        }
        return response([
            'message' => __('there is no user with the entered credentials') 
        ]);
    }


}
