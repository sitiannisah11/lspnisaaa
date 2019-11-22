<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use Auth;

class PageController extends Controller
{
    public function login()
	{
		return view('loginuser.login');
	}
	public function register()
	{
		return view('loginuser.register');
	}
    public function proses_login(Request $r){
    	$name = $r->name;
    	$password = $r->password;
    	if (Auth::attempt(['email' => $name, 'password' => $password]) || Auth::attempt(['name' => $name, 'password' => $password])){
    		if (Auth::user()->role == "2"){
    			return view('/superadmin/index');
    		}
            if (Auth::user()->role == "1"){
    			return view('/admin/index');
    		}
            if (Auth::user()->role == "0"){
                return view('/kasir/index');
            }
            
    	}
    		return redirect('/not_found/404.jpg');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/userlogin/login');
    }
}
