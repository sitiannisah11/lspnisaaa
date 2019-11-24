@extends('layouts.kasir')
@section('content')

<!-- DataTales Example -->

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">

        <?php 
            $name = \App\Checkout::all();
         ?>

         <div class="box-content" id="section-to-print">
        	<div class="title" style="text-align: center;">
        	<h4>Data Transaksi</h4>
        	<h4>POS ANDREA <h4>
        	</div><br><br>

		<table class="table table-bordered">
		  <thead>
		    <tr>
		      <th scope="col">No</th>
		      <th scope="col">Total</th>
		      <th scope="col">Saldo</th>
		      <th scope="col">Kembalian</th>
		      <th scope="col">Kode Unik</th>
		    </tr>
		  </thead>
		  <tbody>
		    @foreach ($name as $datatransaksi)
		    <tr>
		      <td>{{ $loop->iteration }}</td>
		      <td>{{$datatransaksi->total}}</td>
		      <td>{{$datatransaksi->saldo}}</td>
		      <td>{{$datatransaksi->kembalian}}</td>
		      <td>{{$datatransaksi->kode_unik}}</td>
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
          </a>
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