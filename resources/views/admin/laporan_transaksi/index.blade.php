@extends('layouts.admin')
@section('content')

<!-- DataTales Example -->

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">



        <?php 
            $name = \App\Checkout::all();
         ?>

         <div class="box-content" id="section-to-print" width="100%">
        	<div class="title" style="text-align: center;">
        	<h4>Laporan Transaksi</h4>
        	<h4>POS SMKN 10 JAKARTA<h4>
          <h4>Jl. Smea 6 Mayjen Soetoyo</h4>
        	</div><br><br>

		<table class="table table-bordered">
		  <thead>
		    <tr>
		      <th scope="col">No</th>
		      <th scope="col">Kode Unik</th>
		      <th scope="col">User Id</th>
		      <th scope="col">Saldo</th>
		      <th scope="col">Total Harga</th>
          <th scope="col">Kembalian</th>
          <th scope="col">Metode</th>
		    </tr>
		  </thead>
		  <tbody>
		    @foreach ($name as $transaksi)
		    <tr>
		      <td>{{ $loop->iteration }}</td>
		      <td>{{$transaksi->kode_unik}}</td>
          <td>{{$transaksi->user_id}}</td>
          <td>{{$transaksi->saldo}}</td>
          <td>{{$transaksi->total}}</td>
          <td>{{$transaksi->kembalian}}</td>
          <td>{{$transaksi->metode}}</td>
		    </tr>
		    @endforeach
        <br>
		  </tbody>


		</table>
	</h4>
</h4>
</div>
</div>
<a href="#" onclick="printDoc()" style="float: left;">
                  <button type="submit" class="btn btn-icon btn-icon-left btn-success waves-effect waves-light"><i class="ico fa fa-print"></i>Print</button>


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