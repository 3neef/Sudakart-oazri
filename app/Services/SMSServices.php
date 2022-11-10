<?php

namespace App\Services;

class SMSServices
{
    public static function sendsms($text, $phone)
    {


        $curl = curl_init();

        $data = [
            'apikey' => config('services.sms.username'),
            'sender' => config('services.sms.sender'),
            'mobileno' =>  $phone,
            'text' => $text,
        ];

        $query = http_build_query($data);
        // dd($query);

        $url = "https://www.smsalert.co.in/api/push.json";


        $getUrl = $url."?".$query;
            curl_setopt_array($curl, array(
            CURLOPT_URL => $getUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",  
            ));

        $response = curl_exec($curl);





        if(curl_error($curl)){
            dd( 'Request Error:' . curl_error($curl));
        }else{
            dd($response);
        }
        curl_close($curl);



        
    }
}
