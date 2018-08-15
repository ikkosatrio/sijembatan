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
							<li><a href="{{base_url('superuser/kuesioner')}}">Kuesioner</a></li>
							<li class="active">{{ ($type=="create") ? 'Tambah Data Kuesioner' : 'Perbarui Data Kuesioner' }}</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->
				<!-- Content area -->
				<div class="content">

					<!-- Form horizontal -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Tambah Kuesioner</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
						<div class="panel-body">
						<form id="form-blog" class="form-horizontal" action="{{ ($type=='create') ? base_url('superuser/kuesioner/created') : base_url('superuser/kuesioner/updated/'.$kuesioner->id_kuesioner) }}" method="post">
							<div class="form-group">
								<label class="col-lg-2 control-label">Kode <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<input class="form-control" type="text" placeholder="Kode Kuesioner" name="kode_kuesioner"
									value="{{ ($type=='create') ? '' : $kuesioner->kode_kuesioner }}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Judul <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<input class="form-control" type="text" placeholder="Judul Kuesioner" name="judul"
									value="{{ ($type=='create') ? '' : $kuesioner->judul }}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Skala <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<input class="form-control" type="number" placeholder="Skala" name="skala"
									value="{{ ($type=='create') ? '' : $kuesioner->skala }}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Deskripsi <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<textarea rows="10" id="editor-full" cols="100" class="wysihtml5 wysihtml5-default2 form-control"  name="deskripsi" >{!! ($type=='create') ? '' : $kuesioner->deskripsi !!}</textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Masukkan <span class="text-danger"><b>*</b></span></label>
								<div class="col-lg-10">
									<textarea rows="10" id="editor-ku" cols="100" class="wysihtml5 wysihtml5-default2 form-control"  name="masukkan" >{!! ($type=='create') ? '' : $kuesioner->masukkan !!}</textarea>
								</div>
							</div>

					<div class="text-right">
							<button type="submit" class="btn btn-primary">{{ ($type=='create') ? 'Buat Kuesioner' : 'Ubah Kuesioner' }} <i class="icon-arrow-right14 position-right"></i></button>
							@if($type=="update")
							<a class="btn btn-danger" href="javascript:void(0)" onclick="window.history.back(); "> Batalkan <i class="fa fa-times position-right"></i></a>
							@endif
					</div>
					</form>
					</div>
					</div>

					<!-- /form horizontal -->


					<!-- Footer -->
					{{-- <div class="footer text-muted">
						&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div> --}}
					<!-- /footer -->
					@if ($type=='update')
						{{-- expr --}}

					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">List Soal</h5>
							<div class="heading-elements">
		                	</div>
		                	<button type="button" data-toggle="modal" data-target="#modal_soal" class="btn bg-teal-400 btn-labeled pull--right"><b><i class="icon-plus-circle2"></i></b> Tambah Soal</button>
						</div>
						<div class="panel-body">
							<table class="table table-striped datatable-basic table-lg table-responsive">
			                    <thead>
			                        <tr>
			                        	<th>No</th>
			                        	<th>Soal</th>
			                        	<th>Jenis</th>
			                        	<th>Aspek</th>
			                            <th class="text-center">Aksi</th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                    	@foreach($soal as $key => $result)
			                         <tr>
			                        	<td align="center">{{$key+1}}</td>
				                        <td class="">
				                        	<span class="text-size-small text-muted">
				                        		{{$result->soal}}
				                        	</span>
				                        </td>
				                        <td align="center">{{$result->jenis}}</td>
				                        <td align="center">{{$result->aspek}}</td>
				                        <td class="text-center">
				                           <div class="btn-group">
					                    	<button type="button" class="btn btn-danger btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown"><i class="icon-cog5 position-left"></i> Action <span class="caret"></span></button>
					                    	<ul class="dropdown-menu dropdown-menu-right">
												<li>
													<a href="{{base_url('superuser/rekomendasi/lihat/?id_soal='.$result->id_soal)}}">
														<i class="fa fa-edit"></i> Rekomendasi
													</a>
													<a href="javascript:void(0)" onclick="editIt({{$result->id_soal}})">
														<i class="fa fa-edit"></i> Ubah Kuesioner
													</a>
												</li>
												<li><a href="javascript:void(0)" onclick="deleteIt(this)"
												data-url="{{base_url('superuser/soal/deleted/'.$result->id_soal.'/'.$kuesioner->id_kuesioner)}}">
														<i class="fa fa-trash"></i> Hapus Kuesioner
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
					@endif
				</div>
			</div>
			<!-- Horizontal form modal -->
					<div id="modal_soal" class="modal fade">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h5 class="modal-title">Form Soal</h5>
								</div>

								<form action="" class="form-horizontal" id="formSoal">
									<div class="modal-body">
										<div class="form-group">
											<label class="control-label col-sm-3">Soal</label>
											<div class="col-sm-9">
												<input type="hidden" name="id_soal" id="id_soal" value="">
												<input type="hidden" name="id_kuesioner" id="id_kuesioner" value="{{ $kuesioner->id_kuesioner}}">
												<textarea required="true" placeholder="Masukkan Soal" rows="10" id="editor-full" cols="100" class="wysihtml5 isisoal wysihtml5-default2 form-control"  name="soal" ></textarea>
												<br>
												<select required="true" name="jenis" class="form-control">
													<option value="">=Pilih Jenis=</option>
													<option value="positif">POSITIF</option>
													<option value="negatif">NEGATIF</option>
												</select>
												<br>
												<select required="true" name="aspek" class="form-control">
													<option value="">=Pilih ASPEK=</option>
													<option value="Efficiency">Efficiency</option>
													<option value="Memorability">Memorability</option>
													<option value="Error">Error</option>
													<option value="Satisfaction">Satisfaction</option>
													<option value="Learnabillity">Learnabillity</option>
												</select>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Submit form</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- /horizontal form modal -->
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
	$.fn.modal.Constructor.prototype.enforceFocus = function() {
	  modal_this = this
	  $(document).on('focusin.modal', function (e) {
	    if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length
	    && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select')
	    && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
	      modal_this.$element.focus()
	    }
	  })
	};


	$(".switch").bootstrapSwitch();


 	function editIt(id){
 		console.log(id);
 		 $.ajax({
				url: 		"{{base_url('superuser/getsoalajax?id_soal=')}}"+id,
				method: 	"POST",
          		processData: false,
          		contentType: false,
          		dataType:'json',
				beforeSend: function(){
					blockMessage($('#form-blog'),'Please Wait ,','#fff');
				}
			})
			.done(function(data){
				$("#modal_soal").modal('show');
				$("#id_soal").val(data.id_soal);
				$(".isisoal").val(data.soal);
				$('#formSoal').attr('action', '{{base_url('superuser/soal/updated/')}}'+data.id_soal);
			})
			.fail(function() {

			})

 	}

	$('#formSoal').submit(function(e){
		e.preventDefault();
		var formData = new FormData( $("#formSoal")[0] );

		for ( instance in CKEDITOR.instances ) {
	        CKEDITOR.instances[instance].updateElement();
	    }

	    $.ajax({
				url: 		"{{base_url('superuser/soal/created')}}",
				method: 	"POST",
				data:  		new FormData(this),
          		processData: false,
          		contentType: false,
				beforeSend: function(){
					blockMessage($('#form-blog'),'Please Wait ,','#fff');
				}
			})
			.done(function(data){
				$('#formSoal').unblock();
				sweetAlert({
					title: 	((data.auth==false) ? "Opps!" : 'Success'),
					text: 	data.msg,
					type: 	((data.auth==false) ? "error" : "success"),
				},
				function(){
					if(data.auth!=false){
						redirect("{{base_url('superuser/kuesioner/update/'.$kuesioner->id_kuesioner)}}");
						return;
					}
				});
			})
			.fail(function() {
			    $('#formSoal').unblock();
				sweetAlert({
					title: 	"Opss!",
					text: 	"Ada Yang Salah! , Silahkan Coba Lagi Nanti",
					type: 	"error",
				},
				function(){
				});
			 })

	});

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
					blockMessage($('#form-blog'),'Please Wait , {{ ($type =="create") ? "Menambahkan Kuesioner" : "Memperbarui Kuesioner" }}','#fff');
				}
			})
			.done(function(data){
				$('#form-blog').unblock();
				sweetAlert({
					title: 	((data.auth==false) ? "Opps!" : '{{ ($type =="create") ? "Kuesioner Di Buatkan" : "Kuesioner Di Perbarui" }}'),
					text: 	data.msg,
					type: 	((data.auth==false) ? "error" : "success"),
				},
				function(){
					if(data.auth!=false){
						redirect("{{base_url('superuser/kuesioner')}}");
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
