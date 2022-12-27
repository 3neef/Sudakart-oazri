<?php

namespace App\Http\Controllers\Auth\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Customer;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\CodesServices;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class UserController extends Controller
{
    

    public function showLoginForm()
    {
        
        return view('auth.main.login');
    }

    public function login(LoginRequest $request)
    {
        
        $request->authenticate();
        $request->session()->regenerate();
        
        $user = User::where('phone', $request->phone)->first();
        $user->update(['login_date' => now()]);
        return redirect()->intended(RouteServiceProvider::WEBHOME);
       
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home.web');
    }

    public function create()
    {
        
        return view('auth.main.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required','unique:users']
        ]);

        return DB::transaction(function () use ($request) {
            $secondary_phone = "";
            if($request->has('secondary_phone')){
                $secondary_phone = $request->secondary_phone;
            }
            $data = [
                'name' => $request->name,
                'secondary_phone' => $secondary_phone,
                'lat' => '',
                'long' => '',
            ];


            $user = new User();
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;


            $customer = Customer::create($data);
            $customer->wallet()->create();
            $customer->user()->save($user);

            event(new Registered($user));

            Auth::guard('web')->login($user);

            return redirect()->intended(RouteServiceProvider::WEBHOME);
        }); 
    }


    public function ShowVerfiyForm()
    {
        return view('auth.main.confirm-vercode');
    }

    public function verify (Request $request) {
        
        $this->validate($request,[
            'code' => 'required',
        ]);

        $code = CodesServices::verifyCode($request->code);
        if($code){
            return redirect()->route('home.web');
        }else{
            return back()->withErrors('Verfiy Code is Invalide');
        }
       
    }
}
