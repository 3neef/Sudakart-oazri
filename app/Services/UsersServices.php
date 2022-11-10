<?php


namespace App\Services;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersServices
{
    public static function create (Model $model, Request $request) {
        return $model->user()->create([
            // 'username' => $request->username,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
    public static function updatePhone ($user, Request $request) {
        return $user->update([
            'phone' => $request->phone,
            'phone_verified_at' => null
        ]);
    }

    public static function addPassword (Model $model, $request) {
        return $model->user()->update([
            'password' => Hash::make($request->password),
        ]);
    }
    public static function addEmail (Model $model, $request) {
        return $model->user()->update([
            'email' => $request->email,
        ]);
    }

}
