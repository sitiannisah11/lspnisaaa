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
          <button class="btn btn-primary btn-sm waves-effect waves-light">
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
                <td>{{ $s->stok }}</td>
                <td>{{ $s->harga_beli }}</td>
                <td>{{ $s->harga_jual }}</td>
                <td>{{ $s->diskon}}</td> 
                <td>{{ $s->keterangan }}</td>
                <td>
                  <a href="/barang/detail/{{$s->barcode}}" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                  <a href="/barang/delete/{{$s->id}}" class="btn btn-sm btn-danger hapus"><i class="far fa-trash-alt"></i></a>
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