@extends('layouts.kasir')
@section('content')

<!-- DataTales Example -->

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">

        	<div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Metode Pembayaran</h4>
					<div class="card-content">
						<form action="{{route('transaksi_proses_checkout')}}" method="POST">
							@csrf
						<ul class="list-inline">
						<li>
							<div class="radio info"><input type="radio" checked name="metode" id="radio-10" value="Cash"><label for="radio-10">Cash</label></div>
						</li>
						<li>
							<div class="radio pink"><input type="radio" name="metode" id="radio-11" value="Gopay"><label for="radio-11">Gopay</label></div>
						</li>
						<li>
							<div class="radio inverse"><input type="radio" name="metode" id="radio-12" value="Dana"><label for="radio-12">Dana</label></div>
						</li>
					</ul>
					</div>
				</div>
			</div>


			<div class="col-lg-12 col-xs-12">
    			<div class="box-content card white">
					<h4 class="box-title">Item</h4>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<tbody>



    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-left"><strong>Item</strong></td>
    								<td class="no-line text-right">Price</td>
    							</tr>

    							@foreach($cart as $carts)
					            @foreach($carts->relasicart as $produk_cart)
					            <input type="hidden" name="produk_id" value="{{$produk_cart->id}}[]">
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line">{{$produk_cart->nama}} x{{$carts->jumlah}}</td>
    								<td class="thick-line text-right">Rp. {{$carts->sub_total}}</td>
    							</tr>

					            @endforeach
					            @endforeach


					            @if($cart)
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right">Rp. {{$cart->sum('sub_total')}}</td>
    								@else
    								<td class="no-line text-right">Rp. </td>
    								@endif
    							</tr>

    						</tbody>
    					</table>
    					<input type="hidden" name="jumlah" value="{{$carts->jumlah}}">
            			<input type="number" class="form-control" name="saldo" placeholder="Masukkan Jumlah Uang">

    					<div class="bayar" style="float: right;">
    						
    							<button type="submit" class="btn btn-icon btn-icon-left btn-success btn-xs waves-effect waves-light"><i class="ico fa fa-plus"></i>Bayar Barang</button>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>

						</form>
        </div>
    </div>
</div>

@endsection