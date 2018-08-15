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
							<li class="active"><a href="#">Peserta</a></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Daftar Peserta</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
						{{-- <div class="panel-heading">
							<a href="{{base_url('superuser/peserta/create')}}"><button type="button" class="btn bg-teal-400 btn-labeled"><b><i class="icon-plus-circle2"></i></b> Tambah Peserta</button></a>
						</div> --}}
						<table class="table table-striped datatable-basic table-lg table-responsive">
		                    <thead>
		                        <tr>
		                        	<th>No</th>
		                            <th>Peserta</th>
		                            <th style="width: 100px!important;">Sekolah</th>
		                            <th>Bidang</th>
		                            <th>Masa Magang</th>
		                            <th>Verifikasi</th>
		                            <th class="text-center">Surat Pengantar</th>
		                            <th class="text-center">Proposal</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($peserta as $key => $result)
		                         <tr>
		                        	<td align="center">{{($key+1)}}</td>
			                        <td style="width:300px;">
			                        	<a href="{{base_url('superuser/peserta/update/'.$result->id_peserta)}}">
			                        		<b>{{ucwords(read_more($result->nm_peserta,30))}}</b>
			                        	</a><br>
			                        	<span class="text-size-mini">
			                        	Email : {{$result->email}}
			                        	</span><br>
			                        	<span class="text-size-mini">
			                        	Telepon : {{$result->telephone}}
			                        	</span><br>
			                        </td>
			                        <td style="width:300px;">
			                        	<span class="text-size-mini">
			                        	Jenjang : {{$result->jenjang_pendidikan}}
			                        	</span><br>
			                        	<span class="text-size-mini">
			                        	Sekolah : {{$result->nm_sekolah}}
			                        	</span><br>
			                        	<span class="text-size-mini">
			                        	Program Studi : {{$result->program_studi}}
			                        	</span><br>
			                        </td>
			                        <td align="center">
			                        	<span class="text-size-mini">{{$result->nm_bidang}}</span>
			                        </td>
			                        <td align="center">
			                        	<span class="text-size-mini">
			                        	Awal Magang : {{$result->awal_magang}}
			                        	</span><br>
			                        	<span class="text-size-mini">
			                        	Akhir Magang : {{$result->akhir_magang}}
			                        	</span>
			                        </td>
			                        <td align="center">
			                        	{{-- @if($result->status==1)
			                        		<span class="label label-default label-icon" data-popup="tooltip" title="Draft"><i class="icon-pencil5"></i></span>
			                        	@else
			                        		<span class="label label-primary label-icon" data-popup="tooltip" title="Terpublikasikan"><i class="icon-check"></i></span>
			                        	@endif --}}
			                        	<div class="btn-group">
					                    	@if($result->status==1)
						                    	<button type="button" class="btn btn-success btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown"><i class="icon-checkmark4 position-left"></i><span class="caret"></span></button>
						                    	<ul class="dropdown-menu dropdown-menu-right">
													<li>
														<a href="javascript:void(0)" onclick="verifikasi(this,true)" url="{{base_url('superuser/peserta/unverified/'.$result->id_peserta)}}">
															<i class="fa fa-edit"></i> UNVERIFIED
														</a>
													</li>
												</ul>
											@else
												<button type="button" class="btn btn-danger btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown"><i class="icon-cross2 position-left"></i><span class="caret"></span></button>
						                    	<ul class="dropdown-menu dropdown-menu-right">
													<li>
														<a href="javascript:void(0)" onclick="verifikasi(this,true)" url="{{base_url('superuser/peserta/verified/'.$result->id_peserta)}}">
															<i class="fa fa-edit"></i> VERIFIED
														</a>
													</li>
												</ul>
											@endif
										</div>
			                        </td>
			                        <td class="text-center">
			                           <div class="btn-group">
					                    	<button type="button" class="btn btn-danger btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown"><i class="icon-cog5 position-left"></i><span class="caret"></span></button>
					                    	<ul class="dropdown-menu dropdown-menu-right">
												{{-- <li>
													<a href="{{base_url()}}assets/files/surat/{{$result->surat_magang}}">
														<i class="fa fa-edit"></i> Cetak
													</a>
												</li> --}}
												<li><a href="{{base_url()}}assets/files/surat/{{$result->surat_magang}}">
														<i class="fa fa-trash"></i> Simpan
													</a>
												</li>
											</ul>
										</div>
			                        </td>
			                        <td class="text-center">
			                           <div class="btn-group">
					                    	<button type="button" class="btn btn-danger btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown"><i class="icon-cog5 position-left"></i><span class="caret"></span></button>
					                    	<ul class="dropdown-menu dropdown-menu-right">
												{{-- <li>
													<a href="{{base_url()}}assets/files/proposal/{{$result->proposal_magang}}">
														<i class="fa fa-edit"></i> Cetak
													</a>
												</li> --}}
												<li><a href="{{base_url()}}assets/files/proposal/{{$result->proposal_magang}}">
														<i class="fa fa-trash"></i> Simpan
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
	<script type="text/javascript">
		function verifikasi(that,rule){
			var url = $(that).attr('url');
			
			$.ajax({
		        url:  url,
		        type:   "POST",
		        data:   '',
		        beforeSend: function(){
		          blockMessage($('html'),'Please Wait , Processing','#fff');    
		        }
		      })
		      .done(function(data){
		        $('html').unblock();

		        sweetAlert({
					title: 	((data.auth==false) ? "Opps!" : '{{"Proses Selesai"}}'),
					text: 	data.msg,
					type: 	((data.auth==false) ? "error" : "success"),
				},
				function(){
					if(data.auth!=false){
						redirect("{{base_url('superuser/peserta')}}");		
						return;
					}
				});
		      })
		      .fail(function() {
		          $('html').unblock();
		        sweetAlert({
		          title:  "Opss!",
		          text:   "Something Wrong , Try Again Later",
		          type:   "error",
		        },
		        function(){
		        
		        });
		       })
		}
	</script>
@endsection