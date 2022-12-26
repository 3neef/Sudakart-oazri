<?php /** @noinspection ALL */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login']]);
    // }

    public function index()
    {
        return view('auth.login');  
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return mixed
     */
    public function login(Request $request)
    {
        $credentials = request(['phone', 'password']);

        if (! $token = Auth::guard('api')->attempt($credentials)) {
            return response()->json(['error' => __('these credentials dosen\'t match any of our records')], 401);
        }

        $fcm_token = Auth::guard('api')->user()->update([
            'fcm_token' => $request->fcm_token,
            'login_date' => now()
        ]);

        return $this->respondWithToken($token, $fcm_token);
    
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(Auth::guard('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token, $fcm_token)
    {
        return response()->json([
            'access_token' => $token,
            'fcm_token' => $fcm_token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60,
            'user' => Auth::guard('api')->user(),
            'userable' => Auth::guard('api')->user()->userable
        ]);
    }
}
