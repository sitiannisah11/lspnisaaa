@extends('layouts.superadmin')
@section('content')

<!-- DataTales Example -->

<div id="wrapper">
  <div class="main-content">
    <div class="row small-spacing">

      <div class="row" style="display: flex; justify-content: space-between; align-items: center;">
      <div class="box-content" style="width: 90%;">
        <h5 style="text-align: center; font-family:Monaco; color: blue; font-size: 30px;">Informasi Toko</h5>
        <form method="POST" action="/toko/update" enctype="multipart/form-data">
        @csrf

                    <?php
                        $toko = \App\Informasi_toko::all();
                    ?>
                    @foreach ($toko as $q)
                    <input type="hidden" name="id" value="{{$q->id}}">

        <div class=" col-xs-7">
          <h5>Nama Instansi</h5>
          <input type="text" name="nama_instansi" class="form-control" placeholder="Nama Instansi" value="{{$q->nama_instansi}}">
          <h5>Nomor Telepon</h5>
          <input type="number" name="notlp" class="form-control" placeholder="Telepon" value="{{$q->notlp}}">
          <h5>Kode Pos</h5>
          <input type="number" name="kode_pos" class="form-control" placeholder="Kode Pos"  value="{{$q->kode_pos}}">
          <h5>Deskripsi</h5>
          <textarea name="deskripsi" placeholder="Deskripsi" class="form-control">{{$q->deskripsi}}</textarea>
          <h5>Alamat</h5>
          <textarea name="alamat" placeholder="Alamat" class="form-control">{{$q->alamat}}</textarea>
        </div>

 

        <div class=" col-xs-5">
                <center><br>
                    <div class="form-group col-md-12">
                        <img src="{{url('foto/toko/'. $q->foto)}}" alt="Nature" class="responsive" id="blah1" style="width: 250px;height:250px; border-radius: 50%;">
                    </div>
                </center>
          <input class="form-control" type="file" name="foto" onchange="readURL1(this);" value="{{$q->foto}}"><br>
          <button class="btn btn-primary btn-sm waves-effect waves-light" style="margin-left: 15%;">Simpan</button>
        </div>

      </div>
    </form>
    @endforeach

      </div>


    </div>
  </div>
</div>

@endsection