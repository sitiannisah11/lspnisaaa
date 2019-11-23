@extends('layouts.kasir')
@section('content')

<!-- DataTales Example -->

<div id="wrapper">
    <div class="main-content" >
        <div class="row small-spacing">
          <a href="#" onclick="printDoc()" class="btn btn-success my-3" target="_blank">PRINT</a>
          <a href="/transaksi"  class="btn btn-success my-3" target="_blank">Kembali Ke Transaksi</a>

          <div class="box-content" id="section-to-print">
        	<div class="title" style="text-align: center;">
        	<h4>Bukti Pembayaran</h4>
        	<h4>POS ANDREA <h4>
        	</div><br><br>

		<table class="table table-bordered">
		  <thead>
		    <tr>
		      <th scope="col">Nama</th>
		      <th scope="col">Jumlah</th>
		      <th scope="col">Subtotal</th>
		    </tr>
		  </thead>
		  <tbody>
		    @foreach($kode_unik as $kode_uniks)
		    @foreach($kode_uniks->relasicart as $produks)
		    <tr>
		      <td>{{$produks->nama}}</td>
		      <td>{{$kode_uniks->jumlah}}</td>
		      <td>{{$kode_uniks->sub_total}}</td>
		    </tr>
		    @endforeach
		    @endforeach
        <br>
		  </tbody>


		</table>

<!-- MANGGIL MODEL -->
    <table class="table table-condensed">
                  <tr>
                    <td class="no-line"></td>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>Total</strong></td>
                    <td class="no-line text-right">454353</td>
                  </tr>
                  <tr>
                    <td class="no-line"></td>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>Uang Pelanggan</strong></td>
                    <td class="no-line text-right">454353</td>
                  </tr>
                  <tr>
                    <td class="no-line"></td>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>Uang Kembalian</strong></td>
                    <td class="no-line text-right">454353</td>
                  </tr>
            </table>


        </div>
      </h4>
    </h4>
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