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

				<!-- Content area -->
				<div class="content">
					<!-- Dashboard content -->

		<!-- Page content -->
				<div class="panel panel-flat">
					
					<div class="panel-body">
	                @foreach($user as $key => $result)
					<form class="form-horizontal" action="{{base_url('main/update/').$result->user_auth_id}}" method="post">
							<fieldset class="content-group">
								<legend class="text-bold">Edit Data</legend>

								<div class="form-group">
									<label class="control-label col-lg-2">Name</label>
									<div class="col-lg-10">
										<input type="text" name="name" value="{{$result->user_auth_name}}" maxlength="30" required="" class="form-control">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-2">Password</label>
									<div class="col-lg-10">
										<input type="password" name="pass" value="{{$result->user_auth_pass}}" class="form-control" required="">
									</div>
								</div>

                <div class="form-group">
                	<label class="control-label col-lg-2">Role</label>
                	<div class="col-lg-10">
                      <select name="role" class="form-control">
                          <option value="USR" <?=$result->user_auth_level == 'USR' ?'selected' : ''?>>Peserta</option>
                          <option value="KOM" <?=$result->user_auth_level == 'KOM' ?'selected' : ''?>>Kominfo</option>
                          <option value="ADM" <?=$result->user_auth_level == 'ADM' ?'selected' : ''?>>Admin</option>
                      </select>
                    </div>
                </div>
					<button type="submit" class="btn btn-primary btn-xs">Edit <i class="icon-arrow-right14 position-right"></i></button>
							</fieldset>
						</form>
	                    @endforeach
				</div>	
				</div>	
				<!-- /page content -->

					<!-- /dashboard content -->
				</div>
				<!-- /content area -->
	</div>
	<script>
	jQuery(document).ready(function($){
        $('.hapus').on('click',function(){
            var getLink = $(this).attr('href');
            swal({
              title: "Are you sure?",
              text: "You will not be able to recover this imaginary file!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, delete it!",
              cancelButtonText: "No, cancel plx!",
              closeOnConfirm: false,
              closeOnCancel: false
            },
            function(isConfirm){
              if (isConfirm) {
                swal({
                title: "Deleted",
                text: "Data Berhasil Dihapus",
                type: "success",
                },function(){
                window.location.href = getLink
                });
              } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
              }
            });
            return false;
        });
    });
	$(function){
		$('#adduser').on('submit',function(e) {
        e.preventDefault();
        var formData = new FormData( $("#adduser")[0]);
          $.ajax({
            url: $("#adduser").attr('action'), //nama action script php sobat
              method:'POST',
              data:new FormData(this),
              contentType: false,
              processData: false,
              dataType: 'json',
              success:function(data){
                console.log(data);
                if (data.Code == 'Error') {
                  swal("error!", data.Message, "error");
                  // alert(data.Message);
                }else{
                  swal({
                  title: "Succes",
                  // text: data.Message,
                  type: "success",
                  },function(){
                  window.location.href = "{{base_url('main/user')}}"
                  });
                }
              },
              error:function(data){
                alert("Gagal Bro")
              },
          });
        });
	}
	</script>
@endsection
