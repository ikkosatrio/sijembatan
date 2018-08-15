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
							<li><a href="{{base_url('jembatan')}}">Jembatan</a></li>
							<li class="active">{{ ($type=="create") ? 'Tambah Data Jembatan' : 'Perbarui Data Jembatan' }}</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->
				<!-- Content area -->
				<div class="content">

					<!-- Form horizontal -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Tambah Jembatan</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
						<div class="panel-body">
						<form id="form-blog" class="form-horizontal" action="{{ ($type=='create') ? base_url('superuser/jembatan/created') : base_url('superuser/jembatan/updated/'.$jembatan->jembatan_id) }}" method="post">
							<div class="form-group">
								<label class="col-lg-2 control-label">Nomor Ruas <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<input class="form-control" type="number" placeholder="Nomor Ruas" name="nomor_ruas"
									value="{{ ($type=='create') ? '' : $jembatan->jembatan_no_ruas }}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Ruas Jalan<span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<input class="form-control" type="text" placeholder="Nama Ruas" name="nama_ruas"
									value="{{ ($type=='create') ? '' : $jembatan->jembatan_nama_ruas }}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Nama Jembatan <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<input class="form-control" type="text" placeholder="Nama Jembatan" name="nama_jembatan"
									value="{{ ($type=='create') ? '' : $jembatan->jembatan_nama }}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Lokasi (KM) <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<input class="form-control" type="text" placeholder="Lokasi (KM)" name="lokasi"
										   value="{{ ($type=='create') ? '' : $jembatan->jembatan_lokasikm }}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Latitude <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<input class="form-control" type="text" placeholder="Latitude" name="lat"
										   value="{{ ($type=='create') ? '' : $jembatan->jembatan_lat }}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Longitude <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<input class="form-control" type="text" placeholder="Longitude" name="lng"
									value="{{ ($type=='create') ? '' : $jembatan->jembatan_lng }}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Jumlah Bentang <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<input class="form-control" type="text" placeholder="Jumlah Bentang" name="jumlah"
										   value="{{ ($type=='create') ? '' : $jembatan->jembatan_jml_bentang }}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Dimensi <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<div class="row">
										<div class="col-lg-11">
											<input class="form-control" type="text" placeholder="m [P]" name="dimensiP"
											   value="{{ ($type=='create') ? '' : $jembatan->jembatan_dimensiP }}" required>
										</div>
										<div class="col-lg-1">
											m [P]
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-11">
											<input class="form-control" type="text" placeholder="m [L]" name="dimensiL"
											   value="{{ ($type=='create') ? '' : $jembatan->jembatan_dimensiL }}" required>
										</div>
										<div class="col-lg-1">
											m [L]
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-11">
											<input class="form-control" type="text" placeholder="m [T]" name="dimensiT"
											   value="{{ ($type=='create') ? '' : $jembatan->jembatan_dimensiT }}" required>
										</div>
										<div class="col-lg-1">
											m [T]
										</div>
									</div>

								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Bangunan Atas <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<div class="row">
										<div class="col-lg-6">
											Jenis Konstruksi
										</div>
										<div class="col-lg-6">
											Kondisi Jembatan
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<input class="form-control" type="text" placeholder="Jenis Kontruksi Atas" name="atas_jenis"
												   value="{{ ($type=='create') ? '' : $jembatan->jembatan_bang_atas_jenis }}" required>
										</div>
										<div class="col-lg-6">
											<input class="form-control" type="text" placeholder="Kondisi Kontruksi Atas" name="atas_kondisi"
												   value="{{ ($type=='create') ? '' : $jembatan->jembatan_bang_atas_kondisi }}" required>
										</div>
									</div>

								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Bangunan Bawah <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<div class="row">
										<div class="col-lg-6">
											Jenis Konstruksi
										</div>
										<div class="col-lg-6">
											Kondisi Jembatan
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<input class="form-control" type="text" placeholder="Jenis Kontruksi Bawah" name="bawah_jenis"
												   value="{{ ($type=='create') ? '' : $jembatan->jembatan_bang_bawah_jenis }}" required>
										</div>
										<div class="col-lg-6">
											<input class="form-control" type="text" placeholder="Kondisi Kontruksi Bawah" name="bawah_kondisi"
												   value="{{ ($type=='create') ? '' : $jembatan->jembatan_bang_bawah_kondisi }}" required>
										</div>
									</div>

								</div>
							</div>

						
					<div class="text-right">
							<button type="submit" class="btn btn-primary">{{ ($type=='create') ? 'Buat Jembatan' : 'Ubah Jembatan' }} <i class="icon-arrow-right14 position-right"></i></button>
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
					blockMessage($('#form-blog'),'Please Wait , {{ ($type =="create") ? "Menambahkan Jembatan" : "Memperbarui Jembatan" }}','#fff');		
				}
			})
			.done(function(data){
				$('#form-blog').unblock();
				sweetAlert({
					title: 	((data.auth==false) ? "Opps!" : '{{ ($type =="create") ? "Jembatan Di Buatkan" : "Jembatan Di Perbarui" }}'),
					text: 	data.msg,
					type: 	((data.auth==false) ? "error" : "success"),
				},
				function(){
					if(data.auth!=false){
						redirect("{{base_url('superuser/jembatan')}}");
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