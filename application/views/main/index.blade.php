@extends('main.template')
@section('title')
Dashboard - Administrasi
@endsection
@section('corejs')
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/pages/datatables_basic.js"></script>
@endsection
@section('content')
	<div class="content-wrapper">



				<!-- Content area -->
				<div class="content">
					<!-- Dashboard content -->
					<div class="row">
						<div class="col-lg-12">
						<h1 align="center"><span><img src="{{base_url()."assets/imagemain/logo.png"}}" style="height: 100px" alt=""></span>&nbsp;&nbsp;&nbsp;SELAMAT DATANG DI PUBM LAMONGAN</h1>
							<br>
							<!-- Quick stats boxes -->
							{{--<div class="row">--}}
								{{--<div class="col-lg-4">--}}

									{{--<!-- Members online -->--}}
									{{--<div class="panel bg-teal-400">--}}
										{{--<div class="panel-body">--}}
											{{--<div class="heading-elements">--}}
												{{--<span class="heading-text badge bg-teal-800">+53,6%</span>--}}
											{{--</div>--}}

											{{--<h3 class="no-margin">3,450</h3>--}}
											{{--Members online--}}
											{{--<div class="text-muted text-size-small">489 avg</div>--}}
										{{--</div>--}}

										{{--<div class="container-fluid">--}}
											{{--<div id="members-online"></div>--}}
										{{--</div>--}}
									{{--</div>--}}
									{{--<!-- /members online -->--}}

								{{--</div>--}}

								{{--<div class="col-lg-4">--}}

									{{--<!-- Current server load -->--}}
									{{--<div class="panel bg-pink-400">--}}
										{{--<div class="panel-body">--}}
											{{--<div class="heading-elements">--}}
												{{--<ul class="icons-list">--}}
													{{--<li class="dropdown">--}}
														{{--<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>--}}
														{{--<ul class="dropdown-menu dropdown-menu-right">--}}
															{{--<li><a href="#"><i class="icon-sync"></i> Update data</a></li>--}}
															{{--<li><a href="#"><i class="icon-list-unordered"></i> Detailed log</a></li>--}}
															{{--<li><a href="#"><i class="icon-pie5"></i> Statistics</a></li>--}}
															{{--<li><a href="#"><i class="icon-cross3"></i> Clear list</a></li>--}}
														{{--</ul>--}}
													{{--</li>--}}
												{{--</ul>--}}
											{{--</div>--}}

											{{--<h3 class="no-margin">49.4%</h3>--}}
											{{--Current server load--}}
											{{--<div class="text-muted text-size-small">34.6% avg</div>--}}
										{{--</div>--}}

										{{--<div id="server-load"></div>--}}
									{{--</div>--}}
									{{--<!-- /current server load -->--}}

								{{--</div>--}}

								{{--<div class="col-lg-4">--}}

									{{--<!-- Today's revenue -->--}}
									{{--<div class="panel bg-blue-400">--}}
										{{--<div class="panel-body">--}}
											{{--<div class="heading-elements">--}}
												{{--<ul class="icons-list">--}}
													{{--<li><a data-action="reload"></a></li>--}}
												{{--</ul>--}}
											{{--</div>--}}

											{{--<h3 class="no-margin">$18,390</h3>--}}
											{{--Today's revenue--}}
											{{--<div class="text-muted text-size-small">$37,578 avg</div>--}}
										{{--</div>--}}

										{{--<div id="today-revenue"></div>--}}
									{{--</div>--}}
									{{--<!-- /today's revenue -->--}}

								{{--</div>--}}
							{{--</div>--}}
							<!-- /quick stats boxes -->
						</div>


					</div>
					<!-- /dashboard content -->
				</div>
				<!-- /content area -->

			</div>
@endsection
