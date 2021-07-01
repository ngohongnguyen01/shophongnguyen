<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    //
    public function index(){

        return view('Login.index');
    }

    public function checkLogin(Request $request){
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::guard('accounts')->attempt($data)) {
            // ...
            return redirect()->route('admin.home');
        }else{
            dd("false");
        }
    }
}
