@extends('layouts.kasir')
@section('content')

<!-- DataTales Example -->

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
        	

        	<div class=" col-xs-12">
        		<div class="form-group bmd-form-group">
			            			<select class="form-control" name="produk">
				                		<option value="">Pilih Kategori</option>
				              			@foreach($kategori as $j)
				                		<option value="{{$j->id}}">{{$j->nama}}</option>
				              			@endforeach
			            			</select>
			        		</div>
		          <input type="text" name="stok" class="form-control" placeholder="Stok"><br>

		    </div>



        </div>
    </div>
</div>

@endsection