<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function postLogin(Request $request)
    {
        // if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        //     return redirect(route('homepage'));
        // }

        // return view('auth.login',[ 'msg' => "Tai khoan/mk khong dung" ]);
    }
}
