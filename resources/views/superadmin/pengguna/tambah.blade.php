@extends('layouts.superadmin')
@section('content')

<!-- DataTales Example -->

<div id="wrapper">
  <div class="main-content">
    <div class="row small-spacing">



<form  method="POST" action="{{route('pengguna_proses_tambah')}}">
        		@csrf
        	<div class="box-content" style="width: 90%;">
        		<div class="box-title">
        			<h4>Data Barang</h4>
        		</div>

		        <div class=" col-xs-12">
		          <input type="text" name="name" class="form-control" placeholder="Nama"><br>
		          <input type="email" name="email" class="form-control" placeholder="Email"><br>
		          <input type="password" name="password" class="form-control" placeholder="Password"><br>

	      				<div class="row">
				            <div class="col-12 col-md-6">
				            	<select class="form-control" name="role">
			                		<option value="">Hak Akses</option>
			                		<option value="2">Super Admin</option>
			                		<option value="1">Admin</option>
			                		<option value="0">Kasir</option>
		            			</select>	
				            </div>
			        	</div>
		        </div><br>
         		<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light" style="float: right;">Tambah</button>
		    </div><br>
		    </form>



   	</div>
  </div>
</div>

@endsection