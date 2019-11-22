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
    	$username = $r->username;
    	$password = $r->password;
    	if (Auth::attempt(['email' => $username, 'password' => $password]) || Auth::attempt(['username' => $username, 'password' => $password])){
    		if (Auth::user()->role == "2"){
    			return redirect('/superadmin/index');
    		}
    		if (Auth::user()->role == "1"){
    			return redirect('/admin/index');
    		}
    		if (Auth::user()->role == "0"){
    			return redirect('/kasir/index');
    		}
    	}
    		return redirect('/not_found/404.jpg');
    }
    public function proses_register(Request $r){
    	$register = new User;
    	$register->nama = $r->nama;
    	$register->username = $r->username;
    	$register->alamat = $r->alamat;
    	$register->nohp = $r->nohp;
    	$register->email = $r->email;
    	$register->password = Bcrypt($r->password);
        $register->save();
        if (Auth::user()->role == "2"){
        return redirect('/halaman');
    }else{
        return redirect('/suadmin');
    }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/halaman/login');
    }
}
