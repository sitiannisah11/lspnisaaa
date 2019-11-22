<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laba;

class LabaController extends Controller
{
 	public function index()
    {
    	$laba = \App\Laba::all(); 
    	return view('admin.laba.index', compact('laba'));
    }
    public function add(Request $r)
    {
    	$laba = new Laba;
        $laba->nama = $r->nama;
        $laba->save();
        return redirect('/laba');
    }
    public function edit($id){
        $laba = Laba::find($id);
    	return view('admin.laba.edit')->with('laba',$laba);
    }
    public function update(Request $r){
        $laba = Laba::find($r->id);
        $laba->nama = $r->nama;
        $laba->save();
        return redirect('/laba');
    }
    public function delete($id)
    {
    	$laba = Laba::find($id);
    	$laba->delete();
    	return redirect(url('/laba'));
    }
}
