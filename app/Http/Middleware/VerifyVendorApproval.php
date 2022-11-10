<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyVendorApproval
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()) {
            if (Auth::user() != null && Auth::user()->userable_type == 'App\Models\Vendor'){
                if(Auth::user()->userable->approved == 0 || Auth::user()->userable->suspended == 1 ){
                    abort('401', __('You Are suspended or not approved yet.'));
                }
            }
        }
        return $next($request);
    }
}
