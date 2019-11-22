<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatatransaksiController extends Controller
{
    public function index()
    {
    	return view('kasir.datatransaksi.index');
    }
}
