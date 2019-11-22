<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mata_Uang;

class CurController extends Controller
{
    public function index()
    {
    	$cur = \App\Mata_Uang::all(); 
    	return view('admin.cur.index', compact('cur'));
    }
    public function add(Request $r)
    {
    	$cur = new Mata_Uang;
        $cur->nama = $r->nama;
        $cur->save();
        return redirect('/cur');
    }
    public function edit($id){
        $cur = Mata_Uang::find($id);
    	return view('admin.cur.edit')->with('cur',$cur);
    }
    public function update(Request $r){
        $cur = Mata_Uang::find($r->id);
        $cur->nama = $r->nama;
        $cur->save();
        return redirect('/cur');
    }
    public function delete($id)
    {
    	$cur = Mata_Uang::find($id);
    	$cur->delete();
    	return redirect(url('/cur'));
    }
}
