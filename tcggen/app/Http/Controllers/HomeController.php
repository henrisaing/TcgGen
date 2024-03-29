<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use Auth;
use Session;

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
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user = Auth::user();
        $collections = $user->collections()->get();
        
        return view('home', [
            'user' => $user,
            'collections' => $collections
        ]);
    }
}
