@extends('admin.template')
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

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="{{base_url('superuser')}}"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="#">Rekomendasi</a></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Daftar Rekomendasi : {{$soal->soal}}</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
						<div class="panel-heading">
							<a href="{{base_url('superuser/rekomendasi/create')}}?id_soal={{$soal->id_soal}}"><button type="button" class="btn bg-teal-400 btn-labeled"><b><i class="icon-plus-circle2"></i></b> Tambah Rekomendasi</button></a>
						</div>
						<table class="table table-striped datatable-basic table-lg table-responsive">
		                    <thead>
		                        <tr>
		                        	<th>No</th>
		                            <th>Nilai</th>
		                            <th>Rekomendasi</th>
		                            <th class="text-center">Aksi</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($rekomendasi as $key => $result)
		                         <tr>
		                        	<td align="left">{{($key+1)}}</td>
			                        <td style="">
			                        	<a href="{{base_url('superuser/rekomendasi/update/'.$result->id_rekomendasi.'?id_soal='.$soal->id_soal)}}">
			                        	{{$result->nilai}}
			                        	</a><br>
			                        </td>
			                        <td class="">
			                        	<span class="text-size-small">
			                        		{{$result->isi_rekomendasi}}
			                        	</span>
			                        </td>
			                        <td class="text-center">
			                           <div class="btn-group">
					                    	<button type="button" class="btn btn-danger btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown"><i class="icon-cog5 position-left"></i> Action <span class="caret"></span></button>
					                    	<ul class="dropdown-menu dropdown-menu-right">
												<li>
													<a href="{{base_url('superuser/rekomendasi/update/'.$result->id_rekomendasi.'?id_soal='.$soal->id_soal)}}">
														<i class="fa fa-edit"></i> Ubah Rekomendasi
													</a>
												</li>
												<li><a href="javascript:void(0)" onclick="deleteIt(this)"
												data-url="{{base_url('superuser/rekomendasi/deleted/'.$result->id_rekomendasi.'?id_soal='.$soal->id_soal)}}">
														<i class="fa fa-trash"></i> Hapus Rekomendasi
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
					<!-- /basic datatable -->

				</div>
				<!-- /content area -->

			</div>
@endsection
