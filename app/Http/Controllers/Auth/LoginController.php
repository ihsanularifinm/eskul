<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        // dd(auth()->user());
        if (auth()->attempt(array('username' => $input['username'], 'password' => $input['password']))) {
            if (auth()->user()->role->role == 'admin') {
                return redirect()->route('admin.home');
            } else if (auth()->user()->role->role == 'guru') {
                return redirect()->route('guru.home');
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Login gagal. Periksa kembali username dan password anda.');
        }
    }
}