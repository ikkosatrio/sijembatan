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

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="{{base_url('main/kuesioner')}}"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="#">Kuesioner</a></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">
					<form action="" class="form-horizontal" id="formjawab">
					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Kuesioner : {{$kuesioner->judul}}</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
						<div class="panel-heading">
							<table id="responden" class="table table-striped table-sm" style="display: block">
								<tr>
									<td>Nama</td>
									<td id="nama_responden">{{$user->nama}}</td>
								</tr>
								<tr>
									<td>Nama Instansi</td>
									<td id="instansi_responden">{{$user->instansi}}</td>
								</tr>
							</table>
							<br>
							<div class="row">
								<div class="col-md-6">
									{{-- <input type="text" id="keyword" name="keyword" class="form-control" value="" placeholder="Pilih Responden (NIM OR NAMA)"> --}}
									<input type="hidden" id="nim" name="nim" class="form-control" value="{{$user->nim}}">
									<input type="hidden" id="id_responden" name="id_responden" class="form-control" value="{{$user->id_responden}}">
									<input type="hidden" id="kuesioner" name="kuesioner" class="form-control" value="{{$kuesioner->id_kuesioner}}">
								</div>
								{{-- <div class="col-md-6">
									<button type="button" id="btnReset" class="btn bg-danger-400 btn-labeled"><b><i class="icon-eraser"></i></b> Reset Responden</button>
								</div> --}}
							</div>
							<br>
							<div class="row">

							</div>
						</div>
						<table class="table table-striped table-lg table-responsive">
		                    <thead class="bg-blue">
		                        <tr>
		                        	<th>No</th>
		                        	<th>Soal</th>
		                            <th class="pull-right">Jawaban</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($soal as $key => $result)
			                         <tr>
			                        	<td align="center">{{$key+1}}</td>
				                        <td class="">
				                        	<span class="text-size-small">
				                        		{{$result->soal}}
				                        	</span>
				                        </td>
				                        <td class="text-center pull-right">
				                           <div class="form-group">
												@for ($i = 1; $i <= $kuesioner->skala; $i++)
												<div class="radio-inline">
													<label>
														<input type="radio" required="true" name="jawaban-{{$result->id_soal}}" value="{{$i}}">
														{{$i}}
													</label>
												</div>
												@endfor
											</div>
				                        </td>
			                        </tr>
			                        @endforeach
		                    </tbody>
		                </table>
		                <br>
		                <br>
		                <div class="text-right">
								<button type="submit" class="btn btn-primary">Submit Jawaban<i class="icon-arrow-right14 position-right"></i></button>
								@if($type=="update")
								<a class="btn btn-danger" href="javascript:void(0)" onclick="window.history.back(); "> Batalkan <i class="fa fa-times position-right"></i></a>
								@endif
						</div>
						<br>
					</div>
					</form>
					<!-- /basic datatable -->

				</div>
				<!-- /content area -->

			</div>
@endsection
@section('script')
	 <script type="text/javascript">
        $(document).ready(function(){

		    $('#formjawab').submit(function(e){
				e.preventDefault();
				var formData = new FormData( $("#formjawab")[0] );

				// for ( instance in CKEDITOR.instances ) {
			 //        CKEDITOR.instances[instance].updateElement();
			 //    }
			 //
			 	// console.log(new FormData(this));
			 	// debugger;



			    $.ajax({
						url: 		"{{base_url('main/inputjawab')}}",
						method: 	"POST",
						data:  		new FormData(this),
		          		processData: false,
		          		contentType: false,
						beforeSend: function(){
							blockMessage($('#formjawab'),'Please Wait ,','#fff');
						}
					})
					.done(function(data){
						$('#formjawab').unblock();
						sweetAlert({
							title: 	((data.auth==false) ? "Opps!" : 'Success'),
							text: 	data.msg,
							type: 	((data.auth==false) ? "error" : "success"),
						},
						function(){
							if(data.auth!=false){
								// $("#formjawab")
								 $("#btnReset").click();
								 $('#formjawab')[0].reset();
								// redirect("{{base_url('superuser/kuesioner/update/'.$kuesioner->id_kuesioner)}}");
								return;
							}
						});
					})
					.fail(function() {
					    $('#formjawab').unblock();
						sweetAlert({
							title: 	"Opss!",
							text: 	"Ada Yang Salah! , Silahkan Coba Lagi Nanti",
							type: 	"error",
						},
						function(){
						});
					 })

			});

        });
    </script>
@endsection
