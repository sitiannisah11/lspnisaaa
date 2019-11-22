<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mata_Uang;
use App\Kategori;
use App\Unit;
use App\Produk;
use App\Diskon;
use App\Laba;
use App\Stok_Ppn;

class BarangController extends Controller
{
    public function index()
    {
    	$d['produks'] = Produk::all();
    	return view("admin.barang.index", $d);
    }
    public function tambah()
    {
        $kategori = Kategori::all();
        $matauang = Mata_Uang::all();
        $unit = Unit::all();
        $laba = Laba::all();
        $stok_minimum = Stok_Ppn::all();
        return view('admin.barang.add', compact('kategori', 'matauang', 'unit', 'laba', 'stok_minimum'));
    }

    public function add(Request $r){
    	$d = new Produk;
    	$d->kategori_id = $r->input("kategori_id");
    	$d->unit_id = $r->input("unit_id");
    	$d->mata_uang_id = $r->input("mata_uang_id");
    	$d->barcode = rand(1000,10000000000);
    	$d->nama = $r->input("nama");
    	$d->harga_beli = $r->input("harga_beli");
    	$d->stok = $r->input("stok");
    	$d->keterangan = $r->input("keterangan");
    	$d->diskon = $r->input("diskon");
        $d->laba = $r->input("laba_id");
        $d->ppn = $r->input("stok_minimum");



        if($r->diskon != null){
            $diskon = $r->harga_beli * $r->diskon / '100';
            $minus = $r->harga_beli - $diskon;
            $persen = $minus * ($r->laba + $r->ppn) / '100';
            $d->harga_jual = $minus + $persen;
        }else{
        $persen = $r->harga_beli * ($r->laba + $r->ppn) / '100';
        $d->harga_jual = $r->harga_beli + $persen;
        }

    	$d->save();
        return redirect('/barang');
    }
    public function edit($id){
    	$d['units'] = Unit::all();
    	$d['mata__uangs'] = Mata_Uang::all();
    	$d['kategoris'] = Kategori::all();
        $d['produks'] = Produk::find($id);
        return view('admin.barang.edit', $d);
    }
    public function update(Request $r){
        $d = Produk::find($r->input('id'));
    	$d->kategori_id = $r->input("kategori_id");
    	$d->unit_id = $r->input("unit_id");
    	$d->mata_uang_id = $r->input("mata_uang_id");
    	$d->barcode = $r->input("barcode");
    	$d->nama = $r->input("nama");
    	$d->harga_beli = $r->input("harga_beli");
    	$d->harga_jual = $r->input("harga_jual");
    	$d->stok = $r->input("stok");
    	$d->diskon = $r->input("diskon");
    	$d->keterangan = $r->input("keterangan");

        $d->save();
        return redirect('/barang');
    }

    public function delete($id){
        $barang = Produk::find($id);
        $barang->delete();
        return redirect(url('/barang'));
    }
}
