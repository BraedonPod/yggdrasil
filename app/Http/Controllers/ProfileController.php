<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    /**
     * Show the users profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $user = User::where('slug', $slug)->first();
        if(empty($user)){abort(404);}
        return view('profile.components.activity')->with('user', $user);
    }
    
    /**
     * Show the users library.
     *
     * @return \Illuminate\Http\Response
     */
    public function library($slug)
    {
        $user = User::where('slug', $slug)->first();
        if(empty($user)){abort(404);}
        return view('profile.components.library')->with('user', $user);
    }
}
