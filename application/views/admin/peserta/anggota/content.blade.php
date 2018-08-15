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
							<li class="active">{{ ($type=="create") ? 'Tambah Data Anggota' : 'Perbarui Data Anggota' }}</li>
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
						<form id="form-blog" class="form-horizontal" action="{{ ($type=='create') ? base_url('superuser/anggota/created') : base_url('superuser/anggota/updated/'.$kelompok->id_kelompok) }}" method="post">
							<div class="form-group">
								<label class="control-label">
									<button type="button" class="btn bg-teal-400 btn-sm btn-labeled" onclick="NewMember()">Add Anggota <b><i class="icon-plus3"></i></b></button>
								</label>
								<label class="col-lg-2 control-label">Anggota <span class="text-danger"><b>*</b></span></label>
								<div id="box-member" style="margin-top:20px!important">
									@if($type=="update")
										@foreach ($anggota as $result)
											<div class="col-lg-10 container-member" style="margin-top:20px!important">
												<input class="form-control" type="text" placeholder="Nama Anggota" name="namaAnggota[]" 
												value="{{ ($type=='create') ? '' : $result->nm_anggota }}" required>
												<button type="button"  style="margin-top:5px!important" class="btn bg-danger" onclick="removeMember(this)"><i class="icon-trash"></i></button>
											</div>
										@endforeach
									@else
										<div class="col-lg-10">
											<input class="form-control" type="text" placeholder="Nama Anggota" name="namaAnggota[]" 
											value="{{ ($type=='create') ? '' : $bidang->nm_bidang }}" required>
										</div>
									@endif
								</div>
							</div>
					<div class="text-right">
							<button type="submit" class="btn btn-primary">{{ ($type=='create') ? 'Buat Anggota' : 'Ubah Anggota' }} <i class="icon-arrow-right14 position-right"></i></button>
							@if($type=="update")
							<a class="btn btn-danger" href="javascript:void(0)" onclick="window.history.back(); "> Batalkan <i class="fa fa-times position-right"></i></a>
							@endif
					</div>
					</div>
					</form>
					<!-- /form horizontal -->

					
					<!-- Footer -->
					{{-- <div class="footer text-muted">
						&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div> --}}
					<!-- /footer -->

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
	function NewMember(){
		
		var html         = '<div class="col-lg-10 container-member" style="margin-top:20px!important">'+
										'<input class="form-control" type="text" placeholder="Nama Anggota" name="namaAnggota[]" required>'+
										'<button type="button" class="btn bg-danger" style="margin-top:5px!important" onclick="removeMember(this)"><i class="icon-trash"></i></button>'+
							'</div>';
		$("#box-member").append(html);
	}

	function removeMember(that){
		$(that).parents('.container-member').remove();
	}
	$(".switch").bootstrapSwitch();	

	$("#form-blog").submit(function(e){
			e.preventDefault();
			var formData = new FormData( $("#form-blog")[0] );

			 for ( instance in CKEDITOR.instances ) {
		        CKEDITOR.instances[instance].updateElement();
		    }

			$.ajax({
				url: 		$("#form-blog").attr('action'),
				method: 	"POST",
				data:  		new FormData(this),
          		processData: false,
          		contentType: false,
				beforeSend: function(){
					blockMessage($('#form-blog'),'Please Wait , {{ ($type =="create") ? "Menambahkan Kelompok" : "Memperbarui Kelompok" }}','#fff');		
				}
			})
			.done(function(data){
				$('#form-blog').unblock();
				sweetAlert({
					title: 	((data.auth==false) ? "Opps!" : '{{ ($type =="create") ? "Kelompok Di Buatkan" : "Kelompok Di Perbarui" }}'),
					text: 	data.msg,
					type: 	((data.auth==false) ? "error" : "success"),
				},
				function(){
					if(data.auth!=false){
						redirect("{{base_url('superuser/anggota')}}");		
						return;
					}
				});
			})
			.fail(function() {
			    $('#form-blog').unblock();
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
	<script type="text/javascript" src="{{base_url()}}assets/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/pages/editor_ckeditor.js"></script>
	
@endsection
@endsection