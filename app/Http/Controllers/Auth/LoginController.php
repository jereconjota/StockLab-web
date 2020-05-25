<?php

namespace StockLab\Http\Controllers\Auth;

use StockLab\Http\Controllers\Controller;
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


    /*--------------------------------------------------------------*/
    /*
    Se reescribio la funcion de login para poder agregar el valor del select sucursal en la variable session del request
    Lo saque de esta respuesta: https://stackoverflow.com/a/42279660/7936464
    */
    use AuthenticatesUsers{
        login as traitLogin;
    }

    public function login(Request $request)
    {
        $request->session()->put('sucursal', $request->input('sucursal'));
        return $this->traitLogin($request);
    }
    /*--------------------------------------------------------------*/




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
    public function __construct(Request $request)
    {
        $this->middleware('guest')->except('logout');
    }

    public function username(){
        return 'username'; 
    }
}
