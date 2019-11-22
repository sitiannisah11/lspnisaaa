<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PenggunaController extends Controller
{
    public function pengguna() {
    	$pengguna = User::all();
    	return view('superadmin.pengguna.index', compact('pengguna'));
    }
    public function tambah() {
    	$pengguna = User::all();
    	return view('superadmin.pengguna.tambah', compact('pengguna'));
    }
    public function proses_tambah(Request $r) {
    	$pengguna = new User;
    	$pengguna->name = $r->name;
    	$pengguna->email = $r->email;
    	$pengguna->password = bcrypt($r->password);
    	$pengguna->role = $r->role;
    	$pengguna->save();
    	return redirect(route('pengguna'))->with('sukses', 'Data Berhasil Ditambah!');
    }
    public function detail($id) {
    	$pengguna = User::find($id);	
    	return view('superadmin.pengguna.detail', compact('pengguna'));
    }
    public function hapus($id) {
    	$pengguna = User::find($id);
    	$pengguna->delete();
    	return redirect(route('pengguna'))->with('sukses', 'Data Berhasil Dihapus!');
    }
}
