<?php /** @noinspection PhpUndefinedClassInspection */

namespace App\Traits;


use App\Notifications\SmsCodeNotification;
use App\Services\CodesServices;

trait VerifyPhone
{
    protected static function boot()
    {
        parent::boot();
        self::created(function ($model) {
            $code = CodesServices::generate($model);
            $message = __(" Dear Oazri user \n\n your confirmation code is: " . $code . "\n Thank you for using Oazri \n\n Oazri Team");
            $model->notify(new SmsCodeNotification($message));
        });

        self::updated(function ($model) {
            if($model->phone_verified_at == null){
                $code = CodesServices::generate($model);
                $message = __(" Dear Oazri user \n\n your New code is: " . $code . "\n Thank you for using Oazri \n\n Oazri Team");
                $model->notify(new SmsCodeNotification($message));

            }
        });
    }
}
