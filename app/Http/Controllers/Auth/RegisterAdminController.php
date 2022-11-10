<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterAdminRequest;
use App\Http\Requests\RegisterDriverRequest;
use App\Models\Admin;
use App\Models\Driver;
use App\Services\UploadImageServices;
use App\Services\UsersServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterAdminController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  RegisterDriverRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterAdminRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $admin = Admin::create($request->validated());
            UsersServices::create($admin, $request);
            UsersServices::addPassword($admin, $request);
            return $admin;
        });
    }
}
