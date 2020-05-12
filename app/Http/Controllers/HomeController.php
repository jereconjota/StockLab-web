<?php

namespace StockLab\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $ip = $request->ip();
        $ip = \substr($ip,0,11);

        if ($ip === "201.190.237" || $ip === "168.228.143" || $ip === "192.168.10." || $ip === "127.0.0.1") {        
            return view('/welcome', compact('ip'));
        }else{
            return view('errors.ipincorrecta');
        }
    }
}
