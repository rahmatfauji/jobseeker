<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
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
    public function index(Request $request)
    {
        
        $request->user()->authorizeRoles(['admin','user']);

        // dd(Auth::user()->roles->first()->name);
        if($request->user()->hasRole('admin')){
            $user= User::has('jobs_unread')->with('jobs_unread')->get();
            return view('admin.home', compact('user'));
        }
        elseif($request->user()->hasRole('user')){
            // return redirect('profile');
            return view('user.home');
        }
    }
}
