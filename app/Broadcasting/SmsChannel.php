<?php

namespace App\Broadcasting;

use App\Services\SMSServices;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class SmsChannel
{
    // protected $apiUrl = 'http://196.202.134.90/SMSbulk/webacc.aspx';

    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $data = $notification->toSms($notifiable);
        $phone = $notifiable->phone;
        if (str_starts_with($phone, '0')) {
            $phone = substr_replace($phone, '968', 0, 1);
        }
        SMSServices::sendsms($data['message'], $phone);
    }
}
