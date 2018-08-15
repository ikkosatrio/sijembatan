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
							<li><a href="{{base_url('superuser/peserta')}}">Peserta</a></li>
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
							<h5 class="panel-title">Biodata Peserta</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
						<div class="panel-body">
						<form id="form-peserta" class="form-horizontal" action="{{base_url('superuser/peserta/updated/'.$peserta->id_peserta)}}" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<div class="col-lg-12">
				                	@if($peserta->status == 1)
					                	<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
											<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
											<span class="text-semibold">Selamat!</span> Akun anda telah dikonfirmasi selahkan cek email!.
									    </div>
									@else
										<div class="alert alert-danger alert-styled-left alert-arrow-left alert-bordered">
											<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
											<span class="text-semibold">Maaf!</span> Akun anda belum diverifikasi harap tunggu beberapa saat.
									    </div>
									@endif
									@if($peserta->surat_magang!=null && $peserta->proposal_magang==null)
										<div class="alert alert-info alert-styled-left alert-arrow-left alert-bordered">
											<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
											<span class="text-semibold">Proposal!</span> Anda belum upload proposal magang.
									    </div>
									@endif
				                </div>
				            </div>
							<div class="form-group">
								<div class="col-lg-10">
									<div id="changeBtn">
				                      <button id="ganti" type="button" class="btn btn-primary" onclick="changeProf(true)"><i class="fa fa-user"></i> Ganti Profile</button>
				                      <button id="simpan" type="submit" style="display: none" class="btn btn-success"><i class="fa fa-floppy-o"></i> Simpan Profile</button>
				                    </div>
				                </div>		
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Nama Peserta <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<input class="form-control" type="text" placeholder="Nama Kategori" name="nama" 
									value="{{$peserta->nm_peserta}}" required disabled>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Telepon <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<input class="form-control" type="number" placeholder="Telepon" name="telephone" 
									value="{{$peserta->telephone}}" required disabled>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Email <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<input class="form-control" type="email" placeholder="Email" name="email" 
									value="{{$peserta->email}}" required disabled>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Jenjang <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<select class="select-search" name="jenjang" required disabled>
										<option {{($peserta->jenjang_pendidikan=='SMK') ? "selected" : ""}} value="SMK">SMK</option>
										<option {{($peserta->jenjang_pendidikan=='D3') ? "selected" : ""}} value="D3">D3</option>
										<option {{($peserta->jenjang_pendidikan=='D4') ? "selected" : ""}} value="D4">D4</option>
										<option {{($peserta->jenjang_pendidikan=='Perguruan Tinggi') ? "selected" : ""}} value="Perguruan Tinggi">Perguruan Tinggi</option>		
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Nama Sekolah / PT <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<input class="form-control" type="text" placeholder="Nama Sekolah / PT" name="sekolah" 
									value="{{$peserta->nm_sekolah}}" required disabled>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Program Studi <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<input class="form-control" type="text" placeholder="Program Studi" name="program_studi" 
									value="{{$peserta->program_studi}}" required disabled>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Bidang <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<select class="select-search" name="bidang" required disabled>
										<option value="">Pilih Bidang</option>
										@foreach($bidang as $result)
												<option value="{{$result->id_bidang}}" {{($result->id_bidang==$peserta->id_bidang) ? "selected" : ""}}>{{$result->nm_bidang}}</option>
										@endforeach
									</select>

								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Awal Magang <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<input class="form-control" type="date" placeholder="" name="awal" 
									value="{{$peserta->awal_magang}}" required disabled>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Akhir Magang <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<input class="form-control" type="date" placeholder="" name="akhir" 
									value="{{$peserta->akhir_magang}}" required disabled>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Upload Surat Magang <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<label>{{$peserta->surat_magang}}</label>
									<input class="form-control" type="file" placeholder="" name="surat" 
									value="" disabled>
								</div>
							</div>
							@if($peserta->surat_magang!=null)
							<div class="form-group">
								<label class="col-lg-2 control-label">Upload Surat Proposal <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<label>{{$peserta->proposal_magang}}</label>
									<input class="form-control" type="file" placeholder="" name="proposal" 
									value="" disabled>
								</div>
							</div>
							@endif
						
					{{-- <div class="text-right">
							<button type="submit" class="btn btn-primary">{{"Buat Peserta"}} <i class="icon-arrow-right14 position-right"></i></button>
							
							<a class="btn btn-danger" href="javascript:void(0)" onclick="window.history.back(); "> Batalkan <i class="fa fa-times position-right"></i></a>
							
					</div> --}}
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