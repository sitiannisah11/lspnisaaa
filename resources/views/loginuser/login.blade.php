<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Home</title>
	<link rel="stylesheet" href="/ninja/light/assets/styles/style.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="/ninja/light/assets/plugin/waves/waves.min.css">

</head>

<body>

<div id="single-wrapper">
	<form method="POST" action="/loginuser/proses-login" class="frm-single">
        @csrf
		<div class="inside">
			<div class="title"><strong>POS</strong>Andrea</div>
			<!-- /.title -->
			<div class="frm-title">Login</div>
			<!-- /.frm-title -->
			<div class="frm-input"><input name="name" type="text" placeholder="name" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
			<!-- /.frm-input -->
			<div class="frm-input"><input name="password" type="password" placeholder="Password" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>
			<!-- /.clearfix -->
			<button type="submit" class="frm-submit">Login<i class="fa fa-arrow-circle-right"></i></button>
			<div class="row small-spacing">
				<div class="col-sm-12">
					<div class="txt-login-with txt-center">or login with</div>
					<!-- /.txt-login-with -->
				</div>
				<!-- /.col-sm-12 -->
				<div class="col-sm-6"><button type="button" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-facebook text-white waves-effect waves-light"><i class="ico fa fa-facebook"></i><span>Facebook</span></button></div>
				<!-- /.col-sm-6 -->
				<div class="col-sm-6"><button type="button" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-google-plus text-white waves-effect waves-light"><i class="ico fa fa-google-plus"></i>Google+</button></div>
				<!-- /.col-sm-6 -->
			</div>
		</div>
		<!-- .inside -->
	</form>
	<!-- /.frm-single -->
</div><!--/#single-wrapper -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="/ninja/light/assets/script/html5shiv.min.js"></script>
		<script src="/ninja/light/assets/script/respond.min.js"></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="/ninja/light/assets/scripts/jquery.min.js"></script>
	<script src="/ninja/light/assets/scripts/modernizr.min.js"></script>
	<script src="/ninja/light/assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="/ninja/light/assets/plugin/nprogress/nprogress.js"></script>
	<script src="/ninja/light/assets/plugin/waves/waves.min.js"></script>

	<script src="/ninja/light/assets/scripts/main.min.js"></script>
</body>
</html>