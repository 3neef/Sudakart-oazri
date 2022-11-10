<?php


namespace App\Services;


use App\Models\User;
use Illuminate\Support\Facades\DB;

class CodesServices
{
    public static function generate (User $user, $type = 'phone verification') {
        $table = 'verifications_codes';

        if ($type == 'password reset') {
            $table = 'password_resets_codes';
        }

        //todo uncomment code
        
        $code = rand(111111, 999999);
        DB::table($table)->insert([
                'code' => $code,
                'created_at' => now(),
                'phone' => $user->phone,
            ]);

        return $code;
    }

    public static function verifyCode ($code, $type = 'phone verification') {
        $table = 'verifications_codes';

        if ($type == 'password reset') {
            $table = 'password_resets_codes';
        }

        $query = DB::table($table)
            ->where('code', $code)
            ->where('created_at', '>', now()->subMinutes(10)->toDateTimeString())
            ->latest()
            ->first();

        if (!$query) {
            return false;
        }

        return User::where('phone', $query->phone)->first();
    }

    public static function deleteCode ($phone, $type = 'phone verification') {
        $table = 'verifications_codes';

        if ($type == 'password reset') {
            $table = 'password_resets_codes';
        }

        DB::table($table)->where('phone', $phone)->delete();
        return true;
    }

}
