<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Rules\recaptcha;
use Closure;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => ['required', new recaptcha]
        ]);
        unset($credentials['g-recaptcha-response']);
        if (Auth::attempt($credentials)) {
            $user_role = Auth::user()->role;
            switch ($user_role) {
                case 1:
                    return redirect('/inicio_admin');
                    break;
                case 2:
                    return redirect('/inicio_alumno');
                    break;
                case 3:
                    return redirect('/inicio_empresa');
                    break;
                case 4:
                    return redirect('/inicio_asesor-academico');
                    break;
                default:
                    Auth::logout();
                    return redirect('/login')->with('error', 'oops somethins went wrong!');
                    break;
            }
        } else {
            Alert::Error('error','Contraseña o usuario incorrecto');
            return redirect('/login')->withInput();
        }
    }
}
