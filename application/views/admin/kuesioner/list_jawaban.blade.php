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
							<li class="active"><a href="#">Kuesioner</a></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">
					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Jawaban dari : {{$kuesioner->judul}}</h5>
							<h5>Average {{$total}}</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
						<table class="table table-striped datatable-basic table-lg table-responsive">
		                    <thead class="bg-teal-400">
		                        <tr>
		                        	<th>No</th>
		                        	<th>Responden</th>
		                        	<th>Hasil</th>
		                            <th class="pull-right">Aksi</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($jawaban as $key => $result)
			                         <tr>
			                        	<td align="center">{{$key+1}}</td>
				                        <td class="">
				                        	<span class="text-size-small text-muted">
				                        		{{$result->nim}} - {{$result->nama}}
				                        	</span>
				                        </td>
				                        <td align="center">{{$result->hasil}}</td>
				                        <td align="center">DETAIL</td>
			                        </tr>
			                        @endforeach
		                    </tbody>
		                </table>
		                <br>
		                <br>
		            
						<br>
					</div>
					</form>
					<!-- /basic datatable -->					

				</div>
				<!-- /content area -->

			</div>
@endsection