@extends('layouts.admin')
@section('content')

<!-- DataTales Example -->

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
        	<form  method="POST" action="/barang/add">
        		@csrf
        	<div class="box-content" style="width: 90%;">
        		<div class="box-title">
        			<h4>Data Barang</h4>
        		</div>

		        <div class=" col-xs-12">
		          <input type="text" name="nama" class="form-control" placeholder="Nama" required=""><br>
		          
                    	
                    		<div class="form-group bmd-form-group">
			            			<select class="form-control" name="kategori_id" required="">
				                		<option value="">Pilih Kategori</option>
				              			@foreach($kategori as $j)
				                		<option value="{{$j->id}}">{{$j->nama}}</option>
				              			@endforeach
			            			</select>
			        		</div>


		          
                    	<div class="row">
				            <div class="col-12 col-md-6">
				            	<select class="form-control" name="unit_id" required="">
			                		<option value="">Pilih Unit</option>
			              			@foreach($unit as $j)
			                		<option value="{{$j->id}}">{{$j->nama}}</option>
			              			@endforeach
		            			</select>	
				            </div>
					        <div class="col-12 col-md-6">
					        	<select class="form-control" name="mata_uang_id" required="">
			                		<option value="">Pilih Mata Uang</option>
			              			@foreach($matauang as $j)
			                		<option value="{{$j->id}}">{{$j->nama}}</option>
			              			@endforeach
		            			</select>
					        </div>
			        	</div><br>
		          <input type="text" name="harga_beli" class="form-control" placeholder="harga beli" required=""><br>

	          			<div class="row">
	          				<div class="col-12 col-md-6">
			         			<input type="number" name="stok" class="form-control" placeholder="stok" required="">
	          				</div>
	          				<div class="col-12 col-md-6">
			         			<input type="number" name="diskon" class="form-control" placeholder="Diskon">
	          				</div>
			          			
	      				</div><br>

	      				<div class="row">
				            <div class="col-12 col-md-6">
				            	<select class="form-control" name="laba" required="">
			                		<option value="">Pilih Laba</option>
			              			@foreach($laba as $j)
			                		<option value="{{$j->nama}}">{{$j->nama}}</option>
			              			@endforeach
		            			</select>	
				            </div>
					        <div class="col-12 col-md-6">
					        	<select class="form-control" name="ppn" required="">
			                		<option value="">PPN</option>
			              			@foreach($stok_minimum as $j)
			                		<option value="{{$j->ppn}}">Stok Minimum: {{$j->stok}} - PPN: {{$j->ppn}}%</option>
			              			@endforeach
		            			</select>
					        </div>
			        	</div><br>
		          <textarea name="keterangan" placeholder="Keterangan" class="form-control" required=""></textarea>
		        </div><br>
         		<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light" style="float: right;">Tambah</button>
		    </div><br>
		    </form>


       	</div>
	</div>
</div>

@endsection