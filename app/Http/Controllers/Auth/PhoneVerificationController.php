<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\CodesServices;
use App\Util\Helper;
use Illuminate\Http\Request;

class PhoneVerificationController extends Controller
{
    public function resend ($phone) {
        $user = User::where('phone', $phone)->firstOrFail();
        if (!$user->password) {
            CodesServices::deleteCode($phone);
            CodesServices::generate($user);
            return response(['message' => __('phone confirmation code sent successfully')]);
        }
        return response(['message' => __('your phone is already  verified')], 401);
    }

    public function verify (Request $request, $phone) {
        $user = User::where('phone', $phone)->first();
        if (CodesServices::verifyCode($request->code) == $user) {
            $user->update(['phone_verified_at' => now()]);
            if ($user->password != null) {
                CodesServices::deleteCode($user->phone);
            }
            return response(['message' => __('phone confirmed successfully')]);
        }
        return response(['message' => __('wrong code')], 404);
    }
}
