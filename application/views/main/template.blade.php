<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>

	<!-- Global stylesheets -->
	<link rel="shortcut icon" type="image/png" href="{{base_url()."assets/imagemain/logo.png"}}"/>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{base_url()}}assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="{{base_url()}}assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
	<link href="{{base_url()}}assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="{{base_url()}}assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="{{base_url()}}assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="{{base_url()}}assets/css/colors.css" rel="stylesheet" type="text/css">
	<link href="{{base_url()}}assets/js/sweetalert.min.css" rel="stylesheet" type="text/css">
	<link href="{{base_url()}}assets/css/custom2.css" rel="stylesheet" type="text/css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="{{base_url()}}assets/js/core/libraries/jquery.min.js"></script>
	@yield("mainjs")
	<!-- /global stylesheets -->
	@yield('style')
	<!-- Core JS files -->
	<style>
		.navbar-brand {
			padding: 0px 20px;
		}
	</style>

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<span>
				<a class="navbar-brand" href="{{base_url('main')}}"><img src="{{base_url()."assets/imagemain/logo.png"}}" style="height: 43px;" alt=""></a>
				<span style="font-size: xx-large">PEMETAAN LAMONGAN</span>
			</span>
			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">

			</ul>

			<p class="navbar-text"><span class="label bg-success-400">ONLINE</span></p>

			<ul class="nav navbar-nav navbar-right">


				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="assets/images/placeholder.jpg" alt="">
						<span>{{$ctrl->session->userdata('auth_name')}}</span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="{{base_url('main/edit/').$ctrl->session->userdata('id')}}"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href="{{base_url('auth/keluar')}}"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->

	<!-- Second navbar -->
	<div class="navbar navbar-default" id="navbar-second">
		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="navbar-second-toggle">
			<ul class="nav navbar-nav">
				<li class="active"><a href="{{base_url('main')}}"><i class="icon-home8 position-left"></i> Home</a></li>
{{--				<li class=""><a href="{{base_url('main')}}"><i class="icon-display4 position-left"></i> Input Ruas Jalan</a></li>--}}
				<li class=""><a href="{{base_url('main/ruasjalan')}}"><i class="icon-display4 position-left"></i> Data Ruas Jalan</a></li>
				<li class=""><a href="{{base_url('main/laporan')}}"><i class="icon-books position-left"></i> Laporan</a></li>


				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-users position-left"></i> Akun <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">
						<li><a href="{{base_url('main/user')}}"><i class="icon-user"></i> Data User</a></li>

					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /second navbar -->

	@yield('header')

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->

			<!-- /main sidebar -->


			<!-- Main content -->
			@yield('content')

			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/notifications/jgrowl.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/pickers/daterangepicker.js"></script>


	@yield('corejs')
	<script type="text/javascript" src="{{base_url()}}assets/js/core/app.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.2.1/bloodhound.min.js"></script>
	<!-- /theme JS files -->
	<script type="text/javascript" src="{{base_url()}}assets/js/cak-js.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/sweetalert.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/chart/Chart.min.js"></script>

	@yield('script')


	<script type="text/javascript">
		function deleteIt(that){
		swal({
			title: "Apa Anda Yakin ?",
			text: "Anda Akan Menghapus Data Ini",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Ya, Hapus Data!",
			closeOnConfirm: false
		}, function(){
			swal({
					title: "Deleted",
					text: "Data Anda Telah Di Hapus",
					type: "success"
			},function(){
				redirect($(that).attr('data-url'));
			});

		});
	}
	</script>
</body>
</html>
