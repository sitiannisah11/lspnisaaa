<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
    	$kategori = \App\Kategori::all(); 
    	return view('admin.kategori.index', compact('kategori'));
    }
    public function add(Request $r)
    {
    	$kategori = new Kategori;
        $kategori->nama = $r->nama;
        $kategori->save();
        return redirect('/kategori');
    }
    public function edit($id){
        $kategori = Kategori::find($id);
    	return view('admin.kategori.edit')->with('kategori',$kategori);
    }
    public function update(Request $r){
        $kategori = Kategori::find($r->id);
        $kategori->nama = $r->nama;
        $kategori->save();
        return redirect('/kategori');
    }
    public function delete($id)
    {
    	$kategori = Kategori::find($id);
    	$kategori->delete();
    	return redirect(url('/kategori'));
    }
}
