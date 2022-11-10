<?php


namespace App\Util;


class Helper
{
    public static function formatPhone ($phone) {
        if (str_starts_with($phone, '0')) {
            $phone = substr_replace($phone, '249', 0, 1);
        }
        if (str_starts_with($phone, '+249')) {
            $phone = substr_replace($phone, '249', 0, 4);
        }
        return $phone;
    }

}
