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
        if ($ip === "201.190.238.88" || $ip === "168.228.143.124" || $ip === "192.168.10.241" || $ip === "127.0.0.1") {        
            return view('/welcome', compact('ip'));
        }else{
            return view('errors.ipincorrecta');
        }
    }
}
