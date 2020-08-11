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
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:user')->except('logout');
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
            return redirect('/');
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
            return redirect('/');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function logout(Request $request){
        if (Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }
        elseif (Auth::guard('user')->check()){
            Auth::guard('user')->logout();
        }
        else{
            Auth::logout();
        }
        return redirect('/');
    }

}
