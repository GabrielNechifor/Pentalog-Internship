<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Authenticatable;
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
    use Authenticatable;

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

    public function showAdminLoginForm()
    {
        return view('/auth/login', ['url' => 'admin']);
    }

    public function showUserLoginForm()
    {
        return view('/auth/login', ['url' => 'user']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:4'
        ]);

        $creditentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($creditentials, $request->input('remember'))) {
            //dd(Auth::guard('admin')->user());
            //Auth::guard('admin')->login(Auth::guard('admin')->user());
            return redirect()->intended('/');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function userLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:4'
        ]);

        $creditentials = $request->only('email', 'password');
        if (Auth::guard('user')->attempt($creditentials, $request->get('remember'))) {
            //dd(Auth::guard('user')->user());
            //Auth::guard('user')->login(Auth::guard('user')->user(), $request->get('remember'));
            return redirect('/');//->intended('/');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->intended('/');
    }

}
