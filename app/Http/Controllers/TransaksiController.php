<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use \App\Produk;
use \App\Cart;
use \App\Checkout;
use Auth;
use Session;

class TransaksiController extends Controller
{
    public function dashboard() {
    	return view('kasir.dashboard');
    }
    public function transaksi() {
    	$produk = Produk::all();
    	$cart = Cart::where('user_id', '1')->where('status','0')->get();
    	return view('kasir.transaksi.index', compact('produk', 'cart'));
    }
    public function proses_transaksi(Request $r) {
        if(!Session::get('kode_unik')){
            Session::put('kode_unik', rand(11111111,99999999));
        }
        if($r->produk_id == '0'){
            return redirect(route('transaksi'))->with('sukses', 'Anda Belum Memilih Produk!');
        }
        if($r->jumlah <= '0'){
            return redirect(route('transaksi'))->with('sukses', 'Minimal Jumlah Pembelian 1!');
        }
        $harga = Produk::where('id', $r->produk_id)->first();

        if($harga->stok == '0'){
            return redirect(route('transaksi'))->with('sukses', 'Stok Sudah Habis');
        }
        $harga->stok -= $r->jumlah;
        $harga->save();
        $produk_cek = Cart::where('produk_id', $r->produk_id)->where('status', '0')->first();
        if($produk_cek == null){
        $produk = new Cart;
        $produk->produk_id = $r->produk_id;
        $produk->jumlah = $r->jumlah;
        }else{
        $produk = Cart::where('produk_id', $r->produk_id)->where('status', '0')->first();
        $produk->produk_id = $r->produk_id;
        $produk->jumlah += $r->jumlah; 
        }
        $produk->sub_total = $harga->harga_jual * $r->jumlah;
        $produk->user_id = "1";
        $produk->kode_unik = Session::get('kode_unik');
        $produk->save();
        return redirect()->back()->with('sukses', 'Barang Berhasil Ditambah!');
    }
    public function proses_hapus($id) {
        $transaksi = Cart::find($id);
        $harga = Produk::where('id', $transaksi->produk_id)->first();
        $harga->stok += $transaksi->jumlah;
        $harga->save();
        $transaksi->delete();
        return redirect()->back()->with('sukses', 'Barang Berhasil Dihapus!');
    }
    public function proses_hapus_all() {
        $transaksi = Cart::where('user_id', '1')->delete();
        return redirect()->back()->with('sukses', 'Barang Berhasil Dihapus!');
    }
    public function checkout() {
        $produk = Produk::all();
        $cart = Cart::where('user_id', '1')->where('status','0')->get();
        return view('kasir.transaksi.checkout', compact('produk', 'cart'));
    }
    public function proses_checkout(Request $r) {
        $cart = Cart::where('user_id', '1')->where('status', '0')->get();
        if($r->saldo < $cart->sum('sub_total')){
            return redirect(route('transaksi_checkout'))->with('sukses', 'Saldo Yang Anda Masukkan Kurang!');
        }
        if($r->saldo == '0'){
            return redirect(route('transaksi_checkout'))->with('sukses', 'Saldo Yang Anda Masukkan Kurang!');
        }
        $cart2 = Cart::where('kode_unik', Session::get('kode_unik'))->update(array('status' => '1'));
        $checkout = new Checkout;
        $checkout->total = $cart->sum('sub_total');
        $checkout->user_id = '1';
        $checkout->metode = $r->metode;
        $checkout->saldo = $r->saldo;
        $checkout->kode_unik = Session::get('kode_unik');
        $checkout->kembalian = $r->saldo - $cart->sum('sub_total');
        $checkout->save();
        Session::forget('kode_unik');
        return redirect(route('kode_unik'))->with('sukses', 'Transaksi Berhasil!');
    }
    public function kode_unik() {
        $checkout = Checkout::all();
        return view('kasir.transaksi.kode_unik', compact('checkout'));
    }

    public function invoice(Request $r){
        $kode_unik = Cart::where('kode_unik', $r->kode_unik)->get();
        $uang = Checkout::where('kode_unik', $r->kode_unik)->get();

        return view('kasir.transaksi.print', compact('kode_unik','uang'));
    }
}
