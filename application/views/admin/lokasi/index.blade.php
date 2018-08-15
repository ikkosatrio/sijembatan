@extends('admin.template')
@section('title')
Dashboard - Administrasi
@endsection

@section('mainjs')
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2a2DNEaBiNUdL5Q0Lv6JLCBhs12375c0&libraries=places"></script>
@endsection

@section('corejs')
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/pages/datatables_basic.js"></script>
	<script>
        var peta = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
            center: {lat: -7.120481895739, lng:112.41560697556},
            mapTypeId: google.maps.MapTypeId.HYBRID
        });
	</script>
@endsection


@section('content')
	<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="{{base_url('superuser')}}"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="#">Jembatan</a></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Lokasi Jembatan</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
							<div id="map" style="width: 100%;height: 700px;">

							</div>
						</div>
					</div>
					<!-- /basic datatable -->					

				</div>
				<!-- /content area -->

			</div>
@endsection