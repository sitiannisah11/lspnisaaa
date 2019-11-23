@extends('layouts.admin')
@section('content')

<!-- DataTales Example -->

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
        	<form  method="POST" action="/barang/proses_detail">
        		@csrf
        	<div class="box-content" style="width: 90%;">
        		<div class="box-title">
        			<h4>Data Barang</h4>
        		</div>
        		<input type="hidden" name="barcode" value="{{$produk->barcode}}">

		        <div class=" col-xs-12">
		          <input type="text" name="nama" class="form-control" placeholder="Nama" required="" value="{{$produk->nama}}"><br>
		          
                    	
                    		<div class="form-group bmd-form-group">
			            			<select class="form-control" name="kategori_id" required="">
				                		<option selected>Pilih Kategori</option>
				              			@foreach($kategori as $j)
                              			@if($j->id == $produk->kategori_id)
				                		<option value="{{$j->id}}" selected>{{$j->nama}}</option>
                            			@else
                            			<option value="{{$j->id}}">{{$j->nama}}</option>
                            			@endif
				              			@endforeach
			            			</select>
			        		</div>

		          
                    	<div class="row">
				            <div class="col-12 col-md-6">
				            	<select class="form-control" name="unit_id" required="">
			                		<option value="">Pilih Unit</option>
			              				@foreach($unit as $j)
                              			@if($j->id == $produk->unit_id)
				                		<option value="{{$j->id}}" selected>{{$j->nama}}</option>
                            			@else
                            			<option value="{{$j->id}}">{{$j->nama}}</option>
                            			@endif
				              			@endforeach
		            			</select>	
				            </div>
					        <div class="col-12 col-md-6">
					        	<select class="form-control" name="mata_uang_id" required="">
			                		<option value="">Pilih Mata Uang</option>
			              			@foreach($matauang as $j)
                              			@if($j->id == $produk->mata_uang_id)
				                		<option value="{{$j->id}}" selected>{{$j->nama}}</option>
                            			@else
                            			<option value="{{$j->id}}">{{$j->nama}}</option>
                            			@endif
				              			@endforeach
		            			</select>
					        </div>
			        	</div><br>
		          <input type="text" name="harga_beli" class="form-control" placeholder="harga beli" required="" value="{{$produk->harga_beli}}"><br>

	          			<div class="row">
	          				<div class="col-12 col-md-6">
			         			<input type="number" name="stok" class="form-control" placeholder="stok" required="" value="{{$produk->stok}}">
	          				</div>
	          				<div class="col-12 col-md-6">
			         			<input type="number" name="diskon" class="form-control" placeholder="Diskon" value="{{$produk->diskon}}">
	          				</div>
			          			
	      				</div><br>

	      				<div class="row">
				            <div class="col-12 col-md-6">
				            	<select class="form-control" name="laba" required="">
			                		<option value="{{$produk->relasilaba->id}}">{{$produk->relasiunit->laba}}%</option>
			              				@foreach($laba as $j)
				                		<option value="{{$j->id}}" selected>{{$j->nama}}</option>
				              			@endforeach
		            			</select>	
				            </div>


					        <div class="col-12 col-md-6">
					        	<select class="form-control" name="ppn" required="">
			                		<option value="">PPN</option>
			              			@foreach($stok_minimum as $j)
                              			@if($j->id == $produk->ppn)
				                		<option value="{{$j->id}}" selected>{{$j->ppn}}</option>
                            			@else
                            			<option value="{{$j->id}}">{{$j->ppn}}</option>
                            			@endif
				              			@endforeach
		            			</select>
					        </div>

					        <!-- <div class="col-12 col-md-6">
					        	<select class="form-control" name="stokppn_id" required="">
			                		<option value="">Stok dan PPN</option>
                                    @foreach($stok_minimum as $j)
                              			@if($j->id == $produk->stokppn_id)
				                		<option value="{{$j->id}}" selected>Stok Minimum: {{$j->stok}} - PPN: {{$j->ppn}}%</option>
                            			@else
                            			<option value="{{$j->id}}">Stok Minimum: {{$j->stok}} - PPN: {{$j->ppn}}%</option>
                            			@endif
				              			@endforeach
		            			</select>
					        </div> -->
			        	</div><br>








		          <textarea name="keterangan" placeholder="Keterangan" class="form-control" required="">{{$produk->keterangan}}</textarea>
		        </div><br>
         		<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light" style="float: right;">Tambah</button>
		    </div><br>
		    </form>




       	</div>
	</div>
</div>

@endsection