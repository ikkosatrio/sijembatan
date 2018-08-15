@extends('main.template')
@section('title')
Dashboard - Administrasi
@endsection
@section('corejs')

    <script type="text/javascript" src="assets/js/plugins/ui/nicescroll.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/ui/drilldown.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
@endsection
@section('content')
	<div class="content-wrapper">

				<!-- Page header -->
				<!-- <div class="page-header page-header-default">
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="{{base_url('main/kuesioner')}}"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="#">Kuesioner</a></li>
						</ul>
					</div>
				</div> -->
				<!-- /page header -->


				<!-- Content area -->
        <div class="content">
					<!-- Dashboard content -->

		<!-- Page content -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">
                            FOTO RUAS JALAN
						</h4>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                	</ul>
	                	</div>
					</div>
                    <div class="panel-body">
                        <div class="row">
                            @foreach($photos as $photo)
                            <div class="col-lg-2 col-sm-4">
                                <div class="thumbnail">
                                    <div class="thumb">
                                        <a data-fancybox="gallery" href="http://pubmlamongan.com/{{$photo->jalan_foto_path}}" data-caption="{{$photo->jalan_foto_keterangan}}"><img style="height: 150px;" src="http://pubmlamongan.com/{{$photo->jalan_foto_path}}"></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

        </div>
				<!-- /content area -->
	</div>
@endsection
