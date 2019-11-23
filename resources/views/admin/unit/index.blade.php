@extends('layouts.admin')
@section('content')

<!-- DataTales Example -->

<div class="modal fade" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Unit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/unit/add" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Unit</label>
            <input type="text" class="form-control" name="nama" id="recipient-name" required="">
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
        </form>
      </div>
  </div>
</div>
</div>

@foreach($unit as $j)
  <div class="modal fade" id="EditJurusan{{$j->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Udate Data Unit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/unit/update" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{$j->id}}">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Unit</label>
            <input type="text" class="form-control" name="nama" id="recipient-name" value="{{$j->nama}}" required="">
          </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
        </form>
      </div>
  </div>
</div>
</div>
@endforeach

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">



<!-- DataTales Example -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"></h1>
  <a target="_blank"></a>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header-index" style="display: flex; justify-content: space-between; align-items: center;">
      <h6 class="m-0 font-weight-bold"><strong>Nama Unit Barang</strong></h6>
        <a href="#modaladd" data-toggle="modal">
      <button class="btn btn-primary btn-sm waves-effect waves-light">
          <i class="fas fa-plus"></i>
      </button>
        </a>
    </div><br>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="Table" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>NO</th>
              <th>Nama Unit</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          	@foreach($unit as $j)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{$j->nama}}</td>
              <td>
                <a data-toggle="modal" data-target="#EditJurusan{{$j->id}}" class="btn btn-warning btn-sm waves-effect waves-light">
                  <i class="far fa-edit"></i>
                </a>
                <a href="/unit/delete/{{$j->id}}" class="btn btn-orange btn-sm waves-effect waves-light">
                  <i class="far fa-trash-alt"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
       	</div>
	</div>
</div>


@endsection