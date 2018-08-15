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
	<style>
		.page-container {
			padding: 20px;
		}
	</style>
	<!-- Main content -->
	<div class="content-wrapper">
		<!-- Table -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">DATA RUAS JALAN</h5>
				<div class="heading-elements">
					<ul class="icons-list">
						<li><a data-action="collapse"></a></li>
					</ul>
				</div>
			</div>

			{{--<div class="panel-body">--}}
				{{--Starter pages include the most basic components that may help you start your development process - basic grid example, panel, table and form layouts with standard components. Nothing extra.--}}
			{{--</div>--}}

			<div class="table-responsive">
				<table class="table table-striped datatable-basic table-xs table-responsive table-hover">
					<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Kecamatan</th>
						<th>Lebar</th>
						<th>LT [1]</th>
						<th>LNG[1]</th>
						<th>P [1]</th>
						<th>LT [2]</th>
						<th>LNG [2]</th>
						<th>P [2]</th>
						<th class="text-center">AKSI</th>
					</tr>
					</thead>
					<tbody>

					@foreach($jalan as $i => $row)
						<tr>
							<td>{{$i+1}}</td>
							<td>{{$row->jalan_nama}} - {{$row->jalan_nama_ujung}}</td>
							<td>{{$row->kecamatan_1}},{{$row->kecamatan_2}},{{$row->kecamatan_3}}</td>
							<td>{{$row->jalan_lebar}}</td>
							<td>{{$row->jalan_lat1}}</td>
							<td>{{$row->jalan_lng1}}</td>
							<td>{{$row->jalan_panjang1}}</td>
							<td>{{$row->jalan_lat2}}</td>
							<td>{{$row->jalan_lng2}}</td>
							<td>{{$row->jalan_panjang2}}</td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown"><i class="icon-cog5 position-left"></i> Action <span class="caret"></span></button>
									<ul class="dropdown-menu dropdown-menu-right">
										<li>
											<a href="{{base_url('main/detailjalan/'.$row->jalan_id)}}">
												<i class="fa fa-map-o" aria-hidden="true"></i> Detail Ruas Jalan
											</a>
										</li>
										<li><a href="{{base_url('main/informasi_ruas/'.$row->jalan_id)}}">
												<i class="icon-file-presentation"></i> Informasi Ruas
											</a>
										</li>
									</ul>
								</div>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<!-- /table -->

	</div>
	<!-- /main content -->
@endsection