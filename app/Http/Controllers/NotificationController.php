<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\NotificationServices;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user() != null && Auth::user()->userable_type == 'App\Models\Vendor'){
            
            $notifications = Notification::where('user_id', auth()->user()->id)->orWhere('type', 'App\Models\Vendor')->get(); 
            
        }elseif(Auth::user() != null && Auth::user()->userable_type == 'App\Models\Customer'){
            
            $notifications = Notification::where('user_id', auth()->user()->id)->orWhere('type', 'App\Models\Customer')->get(); 
        }
        return $notifications;           

    }

    public function readAll(Request $request){
        Notification::where('user_id', auth()->user()->id)->update(['is_opened'=>1]);
        $notification = Notification::where('user_id', auth()->user()->id)->get();
        if (! $request->expectsJson()) {
            return redirect()->route('admin.pushnotifications');
        }
        return $notification;
    }

    // public function storeToken(Request $request)
    // {
    //     auth()->user()->update(['fcm_token' => $request->token]);
    //     return response()->json(['Token successfully stored.']);
    // }

    public function sendNotificationVendors(Request $request)
    {
        DB::transaction(function () use ($request) {
        $userable_type = $request->userable_type;
        $device_tokens = User::whereNotNull('fcm_token')->where('userable_type', $userable_type)->pluck('fcm_token');
        $message = [
            'title' => $request->title,
            'body' => $request->body,
        ];
        NotificationServices::sendNotification($device_tokens, $message);
        DB::table('notifications')->insert(
            array(
                'title' => $request->title,
                'message' => $request->body,
                'type' => $request->userable_type,
                'item_id' => 00,
                'created_at' => now()
            )

        );
        return redirect()->route('admin.pushnotifications');
    });
    return redirect()->route('admin.pushnotifications');
    }

    public function sendNotificationSpecified(Request $request)
    {
        DB::transaction(function () use ($request) {
        $device_tokens = User::whereIn('id', $request->users)->pluck('fcm_token');
        $message = [
            'title' => $request->title,
            'body' => $request->body,
        ];
        NotificationServices::sendNotification($device_tokens, $message); 
        $users = User::whereIn('id', $request->users)->get();
        foreach ($users as $user) {

            DB::table('notifications')->insert(
                array(
                    'title' => $request->title,
                    'message' => $request->body,
                    'type' => 'specified',
                    'item_id' => 0,
                    'user_id' => $user->id,
                    'created_at' => now()
                )
    
            );
        }
        return redirect()->route('admin.pushnotifications');
    });
    return redirect()->route('admin.pushnotifications');
}
}
