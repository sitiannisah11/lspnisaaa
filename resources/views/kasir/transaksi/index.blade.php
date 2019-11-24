@extends('layouts.kasir')
@section('content')

<!-- DataTales Example -->

 @if($message = Session::get('sukses'))
                <div class="alert alert-primary alert-dismissible fade show" id="sal-basic">
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button> <strong>{{$message}}</strong></div>
                @endif

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">

<div class="col-lg-12 col-xs-12" style="padding-top: 2%;">
				<div class="box-content card white">
					<h4 class="box-title">Cari Barang</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form action="{{route('transaksi_proses_transaksi')}}" method="POST">
                            @csrf
        		<div class="form-group bmd-form-group">
			            			<select class="form-control" name="produk_id">
				                		<option value="">Pilih Produk</option>
				              			@foreach($produk as $produks)
				                		 <option value="{{$produks->id}}">{{$produks->nama}} - Rp. {{$produks->harga_jual}}</option>
				              			@endforeach
			            			</select>
			        		</div>
		          <input type="text" name="jumlah" class="form-control" placeholder="Banyak Item" required=""><br>

		    <button type="submit" class="btn btn-icon btn-icon-left btn-primary btn-sm waves-effect waves-light"><i class="ico fa fa-cart-plus"></i>Tambah</button>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div>

<!-- <div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Metode Pembayaran</h4>
					<div class="card-content">
						<form>
						<ul class="list-inline">
						<li>
							<div class="radio info"><input type="radio" checked name="radio-2" id="radio-10"><label for="radio-10">Cash</label></div>
						</li>
						<li>
							<div class="radio pink"><input type="radio" name="radio-2" id="radio-11"><label for="radio-11">Gopay</label></div>
						</li>
						<li>
							<div class="radio inverse"><input type="radio" name="radio-2" id="radio-12"><label for="radio-12">Dana</label></div>
						</li>
					</ul>
						</form>
					</div>
				</div>
			</div> -->


    	<div class="col-lg-12 col-xs-12">
    			<div class="box-content card white">
					<h4 class="box-title">Item</h4>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>-</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                    <td class="text-right"><strong>Aksi</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							
                                @foreach($cart as $carts)
                                @foreach($carts->relasicart as $produk_cart)
    							<tr>
    								<td>{{$produk_cart->nama}}</td>

    								<td class="text-center">-</td>

    								<td class="text-center">{{$carts->jumlah}}</td>
    								<td class="text-right">Rp. {{$carts->sub_total}}</td>
                                    <td style="float: right;">
                                    <a href="{{route('transaksi_hapus', $carts->id)}}" class="btn btn-sm btn-danger hapus"><i class="ico fa fa-trash"></i></a>
                                    </td>
    							</tr>
                                @endforeach
                                @endforeach



    							<!-- <tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">$670.99</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Shipping</strong></td>
    								<td class="no-line text-right">$15</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right">$685.99</td>
    							</tr> -->

    						</tbody>
    					</table>
    					<div class="bayar" style="float: right;">
                            <a href="{{route('transaksi_checkout')}}">
    							<button type="submit" class="btn btn-icon btn-icon-left btn-success btn-xs waves-effect waves-light"><i class="ico fa fa-btc"></i>Bayar Barang</button>
                            </a>
                            <a href="{{route('transaksi_hapus_all')}}">
    							<button type="submit" class="btn btn-icon btn-icon-left btn-danger btn-xs waves-effect waves-light hapus"><i class="ico fa fa-trash"></i>Hapus Barang</button>
                            </a>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>




        </div>
    </div>
</div>

@endsection