<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;

class UnitController extends Controller
{
    public function index()
    {
    	$unit = \App\Unit::all(); 
    	return view('admin.unit.index', compact('unit'));
    }
    public function add(Request $r)
    {
    	$unit = new Unit;
        $unit->nama = $r->nama;
        $unit->save();
        return redirect('/unit');
    }
    public function edit($id){
        $unit = Unit::find($id);
    	return view('admin.unit.edit')->with('unit',$unit);
    }
    public function update(Request $r){
        $unit = Unit::find($r->id);
        $unit->nama = $r->nama;
        $unit->save();
        return redirect('/unit');
    }
    public function delete($id)
    {
    	$unit = Unit::find($id);
    	$unit->delete();
    	return redirect(url('/unit'));
    }
}
