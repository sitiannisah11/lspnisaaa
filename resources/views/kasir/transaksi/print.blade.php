@extends('layouts.kasir')
@section('content')

<!-- DataTales Example -->

<div id="wrapper">
    <div class="main-content" >
        <div class="row small-spacing">

          <a href="#" onclick="printDoc()">
                  <button type="submit" class="btn btn-icon btn-icon-left btn-success waves-effect waves-light"><i class="ico fa fa-print"></i>Print</button>
          </a>
          <a href="/transaksi">
                  <button type="submit" class="btn btn-icon btn-icon-left btn-warning waves-effect waves-light"><i class="ico fa fa-backward"></i>Kembali</button>
          </a>
          

          <div class="box-content" id="section-to-print">
        	<div class="title" style="text-align: center;">
        	<h4>Bukti Pembayaran</h4>
        	<h4>POS ANDREA <h4>
        	</div><br>

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
        <br>
		  </tbody>
      @endforeach
      @endforeach

		</table>

<!-- MANGGIL MODEL -->

    @foreach($uang as $p)
    <table class="table table-condensed">
                  <tr>
                    <td class="no-line"></td>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>Total</strong></td>
                    <td class="no-line text-right">{{$p->total}}</td>
                  </tr>
                  <tr>
                    <td class="no-line"></td>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>Uang Pelanggan</strong></td>
                    <td class="no-line text-right">{{$p->saldo}}</td>
                  </tr>
                  <tr>
                    <td class="no-line"></td>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>Uang Kembalian</strong></td>
                    <td class="no-line text-right">{{$p->kembalian}}</td>
                  </tr>
            </table>

        @endforeach


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