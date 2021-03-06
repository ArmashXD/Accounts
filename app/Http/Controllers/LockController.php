<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lockscreen()
    {

        Session::put('locked', 'true');
        return view('lock.index');
    }

    public function unlock(Request $request)
    {
        $password = $request->password;

        if(\Hash::check($password, \Auth::user()->password)){
            dd('asd');
            return response()->json(array('success' => false,
                'true' => 'true',
            ), 200);
        }
    }
}
