<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboards/user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginAdmin(){
        return view('auth.login-admin');
    }

    public function loginAdmin(Request $request){
        Auth::guard('admin')->attempt(
            [
                'email' => $request->email,
                'password' => $request->password,
            ],
            $request->get('remember')
        );
        
        if(Auth::guard('admin')->check())
            return redirect()->route('dashboards.admin');
        else
            return redirect()->route('show-login-admin')->with('error', "Credentials don't match out record");
    }
}
