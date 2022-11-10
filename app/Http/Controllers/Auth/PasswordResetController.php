<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordResetRequest;
use App\Models\User;
use App\Notifications\SmsCodeNotification;
use App\Services\CodesServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{

    public function forgotPassword (Request $request) {
        $user = User::where('phone', $request->phone)->firstOrFail();
        CodesServices::deleteCode($request->phone, 'password reset');
        $code = CodesServices::generate($user, 'password reset');
        $user->notify(new SmsCodeNotification(__('Your password reset code is ' . $code)));
        return response(['message' => __('password reset code sent successfully')]);
    }

    public function checkCode (Request $request) {
        $check = CodesServices::verifyCode($request->code, 'password reset');
        if ($check) {
            return response(['message' => __('valid code')]);
        }
        return response(['message' => __('code is not valid ')], 404);
    }

    public function resetPassword (PasswordResetRequest $request) {
        $user = CodesServices::verifyCode($request->code, 'password reset');
        $user->update(['password' => Hash::make($request->password)]);
        CodesServices::deleteCode($user->phone, 'password reset');
        return response(['message' => __('password reset successfully')]);
    }

}
