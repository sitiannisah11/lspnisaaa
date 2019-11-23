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
        $d->laba = $r->input("laba");
        $d->ppn = $r->input("ppn");



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
    public function detail($barcode) {
        $kategori = Kategori::all();
        $matauang = Mata_Uang::all();
        $unit = Unit::all();
        $laba = Laba::all();
        $stok_minimum = Stok_Ppn::all();
        $produk = Produk::where('barcode', $barcode)->first();
        return view('admin.barang.edit', compact('produk', 'kategori', 'matauang', 'unit', 'laba', 'stok_minimum'));
    }

    public function proses_detail(Request $r) {
        $produk = Produk::where('barcode', $r->barcode)->first();
        $produk->nama = $r->nama;
        $produk->stok = $r->stok;
        $produk->kategori_id = $r->kategori_id;
        $produk->mata_uang_id = $r->mata_uang_id;
        $produk->unit_id = $r->unit_id;
        $produk->harga_beli = $r->harga_beli;
        $produk->keterangan = $r->keterangan;
        $produk->diskon = $r->diskon;
        $produk->laba = $r->laba;
        $produk->ppn = $r->ppn;

        if($r->diskon != null){
            $diskon = $r->harga_beli * $r->diskon / '100';
            $minus = $r->harga_beli - $diskon;
            $persen = $minus * ($r->laba + $r->ppn) / '100';
            $produk->harga_jual = $minus + $persen;
        }else{
        $persen = $r->harga_beli * ($r->laba + $r->ppn) / '100';
        $produk->harga_jual = $r->harga_beli + $persen;
        }
        $produk->save();
        return redirect()->back()->with('sukses', 'Data Berhasil Diubah!');
    }

    public function delete($id){
        $barang = Produk::find($id);
        $barang->delete();
        return redirect(url('/barang'));
    }
}
