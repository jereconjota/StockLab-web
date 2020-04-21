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
        // if ($ip === "127.0.0.1" || $ip === "127.0.0.1") {
            return view('/welcome', compact('ip'));
        // }else{
            // return view('errors.ipincorrecta');
        // }
    }
}
