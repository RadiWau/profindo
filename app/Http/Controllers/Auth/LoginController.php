<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Apotekers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function doLogin(Request $request)
    {
        $username = $request->kdApoteker;
		$password = $request->password;
        $apoteker = Apotekers::where('kodeApoteker', $username)->first();

        
        
        if(empty($apoteker)){
            return redirect()->to('/login')->with('gagal','Data Tidak Ditemukan');
        }else{
            if(!Hash::check($request->password, $apoteker->password)) {
				return redirect()->to('/login')->with('gagal','Password Anda Salah');
            }else{

                Session::put('kdApoteker', $apoteker === null ? null : $apoteker->kodeApoteker);
		        Session::put('NmApoteker', $apoteker === null ? null : $apoteker->nm_apoteker);
                return redirect()->to('/beranda');
            }
        }
    }

    protected function doLogout(Request $request)
    {
        \Session::forget('key');
		\Session::flush();

        return redirect()->to('/login');
    }

}
