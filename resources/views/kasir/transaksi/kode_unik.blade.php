@extends('layouts.kasir')
@section('content')

<!-- DataTales Example -->

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">


<form action="{{route('invoice')}}" method="GET">
	@csrf

	<select class="form-control" name="kode_unik">
                                            <option>Pilih Invoice</option>
                                            @foreach($checkout as $checkouts)
                                            <option value="{{$checkouts->kode_unik}}">{{$checkouts->kode_unik}}</option>
                                            @endforeach
                                        </select><br>
                                        <button type="submit" class="btn btn-rounded btn-info"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i> </span>Check Invoice</button>



</form>



        </div>
    </div>
</div>
@endsection