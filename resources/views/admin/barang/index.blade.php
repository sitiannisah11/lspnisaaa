@extends('layouts.admin')
@section('content')

<!-- DataTales Example -->

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
<div class="col-xs-12">
        <div class="box-content">
          <div class="box-title" style="display: flex; justify-content: space-between; align-items: center;">
          <h4 class="box-title">Data Barang</h4>
          <a href="/barang/tambah">
          <button class="btn btn-outline-primary">
            <i class="fas fa-plus"></i>
          </button>
        </a>
          </div>
          <!-- /.dropdown js__dropdown -->
          <table id="example-scroll-y" class="table table-striped table-bordered display" style="width:100%">
            <thead>
              <tr>
                <th>NO</th>
                <th>Barcode</th>
                <th>nama</th>
                <th>kategori</th>
                <th>unit</th>
                <th>Mata Uang</th>
                <th>stok</th>
                <th>harga beli</th>
                <th>harga jual</th>
                <th>diskon</th>
                <th>keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($produks as $s)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->barcode }}</td>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->kategori->nama }}</td>
                <td>{{ $s->unit->nama }}</td>
                <td>{{ $s->mata_uang->nama }}</td>
                <td>{{ $s->stok }}</td>
                <td>{{ $s->harga_beli }}</td>
                <td>{{ $s->harga_jual }}</td>
                <td>{{ $s->diskon}}</td> 
                <td>{{ $s->keterangan }}</td>
                <td>
                  <a href="#" class="btn btn-warning" ><i class="far fa-edit"></i></a>
                  <a href="#" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.box-content -->
      </div>

</div>
</div>
</div>

@endsection