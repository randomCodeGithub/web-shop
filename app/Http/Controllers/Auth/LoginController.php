<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    protected function authenticated(Request $request, $user)
    {
        $orderId = session('order_Id');
        if(!is_null($orderId)){
            return redirect('/cart');
        }

        if(Auth::user()->isAdmin()) {
            return redirect()->route('orders');
        }
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'login_password' => 'required|string',
        ]);
    }

    protected function credentials(Request $request)
    {
        return [
            'email' => $request->input($this->username()),
            'password' => $request->input('login_password'),
        ];
    }

    public function username()
    {
        return 'login_email';
    }

    public function showLoginForm()
    {
        return redirect('auth');
    }
}
