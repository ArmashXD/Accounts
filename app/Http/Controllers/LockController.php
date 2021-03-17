<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lockscreen()
    {
        if(Auth::check()){
            \Session::put('locked', true);

            return view('lock.index');
        }
    }

    public function unlock(Request $request)
    {
        $password = $request->password;

        if(\Hash::check($password, \Auth::user()->password)){
            return redirect('/');
        }
        return redirect()->back();
    }
}
