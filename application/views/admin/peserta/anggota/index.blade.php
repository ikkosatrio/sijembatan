@extends('admin.template')
@section('title')
Dashboard - Administrasi
@endsection
@section('style')
	
@endsection
@section('corejs')
	<script type="text/javascript" src="{{base_url()}}assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/pages/form_inputs.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/pages/form_select2.js"></script>

@endsection
@section('content')
	<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="{{base_url('superuser')}}"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a href="{{base_url('superuser/anggota')}}">Anggota</a></li>
							<li class="active"></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->
				<!-- Content area -->
				<div class="content">
					<!-- Form horizontal -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Anggota Kelompok</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
						<div class="panel-body">
						<form id="form-peserta" class="form-horizontal" action="{{base_url('superuser/anggota/update/')}}" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<div class="col-lg-10">
									@if ($kelompok)
										<a href="{{base_url("superuser/").'anggota/update'}}"><button id="update" type="button" class="btn btn-primary"><i class="icon-pencil"></i> Update Anggota</button></a>
									@else
										<a href="{{base_url("superuser/").'anggota/create'}}"><button id="simpan" type="button" class="btn btn-primary"><i class="icon-add"></i> Tambah Anggota</button></a>
									@endif

				                </div>		
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Pembimbing <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<input class="form-control" type="text" placeholder="Nama Kategori" name="nama" 
									value="{{$kelompok->nm_user}}" required disabled>
								</div>
							</div>
						</form>
						<table class="table table-striped datatable-basic table-lg table-responsive">
		                    <thead>
		                        <tr>
		                        	<th>No</th>
		                            <th>Nama Anggota</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($anggota as $key => $result)
		                         <tr>
		                        	<td align="center">{{($key+1)}}</td>
			                        <td style="width:300px;">
			                        	{{$result->nm_anggota}}			                  
			                        </td>
		                        </tr>
		                        @endforeach
		                    </tbody>
		                </table>
				</div>
			</div>
	@section('script')
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/uploaders/fileinput.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/pages/form_layouts.js"></script>

	<script type="text/javascript">
		var editorsmall = false;
	</script>

	<script type="text/javascript" src="{{base_url()}}assets/js/pages/uploader_bootstrap.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/forms/styling/switch.min.js"></script>
	<script type="text/javascript">
	$(".switch").bootstrapSwitch();	

	$("#form-peserta").submit(function(e){
			e.preventDefault();
			var formData = new FormData( $("#form-peserta")[0] );

			 for ( instance in CKEDITOR.instances ) {
		        CKEDITOR.instances[instance].updateElement();
		    }

			$.ajax({
				url: 		$("#form-peserta").attr('action'),
				method: 	"POST",
				data:  		new FormData(this),
          		processData: false,
          		contentType: false,
				beforeSend: function(){
					blockMessage($('#form-peserta'),'Please Wait , {{"Memperbarui Peserta"}}','#fff');		
				}
			})
			.done(function(data){
				$('#form-peserta').unblock();
				sweetAlert({
					title: 	((data.auth==false) ? "Opps!" : '{{"Peserta Di Perbarui"}}'),
					text: 	data.msg,
					type: 	((data.auth==false) ? "error" : "success"),
				},
				function(){
					if(data.auth!=false){
						redirect("{{base_url('superuser')}}");		
						return;
					}
				});
			})
			.fail(function() {
			    $('#form-peserta').unblock();
				sweetAlert({
					title: 	"Opss!",
					text: 	"Ada Yang Salah! , Silahkan Coba Lagi Nanti",
					type: 	"error",
				},
				function(){
				});
			 })
			
		})
	</script>
	<script type="text/javascript">
		function changeProf(type){
		    if(type==true){
		      $("#changeBtn").fadeOut(function(){
		        $("#changeBtn").find("#simpan").css("display", "block");
		        $("#changeBtn").find("#ganti").css("display", "none");

		        $("#form-peserta").find("input").removeAttr('disabled');
		        $("#form-peserta").find("select").removeAttr('disabled');
		        $("#form-peserta").find("textarea").removeAttr('disabled');
		        $("#changeBtn").fadeIn();
		      })
		    }
		    else {
		      $("#change").fadeOut(function(){
		        $("#change").find("input").prop("required",false);
		        $("#not-change").fadeIn();
		      })
		    }
		  }
	</script>
	<script type="text/javascript" src="{{base_url()}}assets/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/pages/editor_ckeditor.js"></script>
	
@endsection
@endsection