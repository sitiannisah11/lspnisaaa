                                       <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Informasi_Toko;

class TokoController extends Controller
{
    public function index()
    {
    	return view('superadmin.toko.index');
    }
    public function update(Request $r)
    {
    	$l = Informasi_Toko::find($r->input('id'));
    	$l->nama_instansi = $r->input('nama_instansi');
    	$l->notlp = $r->input('notlp');
    	$l->kode_pos = $r->input('kode_pos');
    	$l->deskripsi = $r->input('deskripsi');

    	if($r->file('foto')){
            $file = $r->file('foto');
            $filename = $file->getClientOriginalName();
            $r->file('foto')->move("foto/toko", $filename);
            $l->foto = $filename;
        }
    	$l->save();
    	return redirect(url('/toko'));
    }
}
