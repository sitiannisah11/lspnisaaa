@extends('layouts.admin')
@section('content')

<!-- DataTales Example -->

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">

          <a href="#" onclick="printDoc()" class="btn btn-success my-3" target="_blank">PRINT</a>
        	


        <?php 
            $name = \App\Produk::all();
         ?>

         <div class="box-content" id="section-to-print" width="100%">
        	<div class="title" style="text-align: center;">
        	<h4>Laporan Barang</h4>
        	<h4>POS ANDREA <h4>
        	</div><br><br>

		<table class="table table-bordered">
		  <thead>
		    <tr>
		      <th scope="col">No</th>
		      <th scope="col">Barcode</th>
		      <th scope="col">Nama Barang</th>
		      <th scope="col">Harga Beli</th>
		      <th scope="col">Harga Jual</th>
          <th scope="col">Keterangan</th>
		    </tr>
		  </thead>
		  <tbody>
		    @foreach ($name as $barang)
		    <tr>
		      <td>{{ $loop->iteration }}</td>
		      <td>{{$barang->barcode}}</td>
          <td>{{$barang->nama}}</td>
          <td>{{$barang->harga_beli}}</td>
          <td>{{$barang->harga_jual}}</td>
          <td>{{$barang->keterangan}}</td>
		    </tr>
		    @endforeach
        <br>
		  </tbody>


		</table>
	</h4>
</h4>
</div>
</div>



        </div>
    </div>
</div>

@endsection


<style type="text/css">
  @media print {
    body * {
      visibility: hidden;
    }
    #section-to-print, #section-to-print * {
      visibility: visible;
    }
    #section-to-print {
      position: absolute;
      left: 0;
      top: 0;
    }
  }
</style>
<script type="text/javascript">
  function printDoc(){
    window.print()
  }
</script>