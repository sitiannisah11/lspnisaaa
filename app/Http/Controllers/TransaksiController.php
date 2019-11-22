<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class TransaksiController extends Controller
{
    public function index()
    {
    	$kategori = Kategori::all();
    	return view('kasir.transaksi.index', compact('kategori'));
    }
}
