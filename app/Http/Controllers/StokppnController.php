<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stok_Ppn;

class StokppnController extends Controller
{
    public function index()
    {
    	$stokppn = \App\Stok_Ppn::all(); 
    	return view('admin.stokppn.index', compact('stokppn'));
    }
    public function add(Request $r)
    {
    	$stokppn = new Stok_Ppn;
        $stokppn->stok = $r->stok;
        $stokppn->ppn = $r->ppn;
        $stokppn->save();
        return redirect('/stokppn');
    }
    public function edit($id){
        $stokppn = Stok_Ppn::find($id);
    	return view('admin.stokppn.edit')->with('stokppn',$stokppn);
    }
    public function update(Request $r){
        $stokppn = Stok_Ppn::find($r->id);
        $stokppn->stok = $r->stok;
        $stokppn->ppn = $r->ppn;
        $stokppn->save();
        return redirect('/stokppn');
    }
    public function delete($id)
    {
    	$stokppn = Stok_Ppn::find($id);
    	$stokppn->delete();
    	return redirect(url('/stokppn'));
    }
}
