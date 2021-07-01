<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class login extends Controller
{
    public function login(Request $request){
        $username = $request->username;
        $password = $request->password;        
    }
}
