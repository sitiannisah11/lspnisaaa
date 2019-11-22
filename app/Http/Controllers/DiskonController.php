<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diskon;

class DiskonController extends Controller
{
    public function index()
    {
    	$diskon = \App\Diskon::all(); 
    	return view('admin.diskon.index', compact('diskon'));
    }
    public function add(Request $r)
    {
    	$diskon = new Diskon;
        $diskon->nama = $r->nama;
        $diskon->save();
        return redirect('/diskon');
    }
    public function edit($id){
        $diskon = Diskon::find($id);
    	return view('admin.diskon.edit')->with('diskon',$diskon);
    }
    public function update(Request $r){
        $diskon = Diskon::find($r->id);
        $diskon->nama = $r->nama;
        $diskon->save();
        return redirect('/diskon');
    }
    public function delete($id)
    {
    	$diskon = Diskon::find($id);
    	$diskon->delete();
    	return redirect(url('/diskon'));
    }
}
