<?php

namespace App\Http\Controllers;

use Auth;
use App\Profile;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('profile',['slug'=> Auth::user()->slug ]);
    }

    public function notifications()
    {
        Auth::user()->unreadNotifications->markAsRead();
        
        return view('nots')->with('nots', Auth::user()->notifications);
    }
}
