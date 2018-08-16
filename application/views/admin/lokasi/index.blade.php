@extends('admin.template')
@section('title')
Dashboard - Administrasi
@endsection

@section('mainjs')
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2a2DNEaBiNUdL5Q0Lv6JLCBhs12375c0&libraries=places"></script>
@endsection

@section('corejs')
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/pages/datatables_basic.js"></script>

    <script type="text/javascript" src="assets/js/plugins/ui/nicescroll.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/ui/drilldown.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>

	<script>
        var peta = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
            center: {lat: -7.120481895739, lng:112.41560697556},
            mapTypeId: google.maps.MapTypeId.HYBRID
        });

        $.ajax({
            url: "{{base_url("superuser/getjembatanjson/")}}",
            type: 'POST',
            processData: false,
            contentType: false,
            dataType: 'json',
            beforeSend: function(){
            }
        })
            .done(function(data){
                if (data.Meta.Code == 200){
                    var datas = data.Data;
                    // var datasCoordinates = [];
                    peta.setCenter(new google.maps.LatLng(datas[0].jembatan_lat, datas[0].jembatan_lng));
                    for (var i = 0;i<datas.length;i++){
                        var latlng = new google.maps.LatLng(datas[i].jembatan_lat,datas[i].jembatan_lng);
                        //datasCoordinates.push(latlng);
                        //var text = i+1+". KM : "+datas[i].jalan_pointer_km+","+datas[i].lat+","+datas[i].lng;
                        drawMarker(latlng,i,datas[i]);
                    }
                    // drawRute(datasCoordinates);
                }
            })
            .fail(function() {
                console.log("salah");
            });

        var infowindow = new google.maps.InfoWindow();
        var markerJalanUtama;
        function drawMarker(rute,i,data) {
            markerJalanUtama = new google.maps.Marker({
                position: rute,
                map: peta,

            });


            var contentString = "<div class='panel panel-body'>"+
            "<div class='row'>"+
                "<div class='col-md-6'><a data-fancybox='gallery' href='http://cdn2.tstatic.net/palembang/foto/bank/images/penutupan-jalan-di-depan-pasar-cinde-palembang-senin-1382018_20180813_093853.jpg' data-caption='asd'><img src='http://cdn2.tstatic.net/palembang/foto/bank/images/penutupan-jalan-di-depan-pasar-cinde-palembang-senin-1382018_20180813_093853.jpg' style='height: 120px;width: 160px' alt=''></a></div>"+
                "<div class='col-md-6'><strong>No Ruas Jalan</strong> : "+data.jembatan_no_ruas+
                "</br>"+
                "<strong>Nama Jalan</strong> : "+data.jembatan_nama_ruas+
                "</br>"+
                "<strong>Nama Jembatan</strong> : "+data.jembatan_nama+
                "</br>"+
                "<strong>Dimensi</strong> : "+
                "</br>"+
                "&nbsp;"+"Panjang : "+data.jembatan_dimensiP+
                "</br>"+
                "&nbsp;"+"Lebar : "+data.jembatan_dimensiL+
                "</br>"+
                "&nbsp;"+"Tinggi : "+data.jembatan_dimensiT+
                "</div>"+
                "</div>"+
                "</br>"+
                "<div class='row'>"+
                "<table class='table table-bordered'>"+
                "<thead>"+
                "<tr>"+
                "<th colspan='2'>Bangunan Atas</th>"+
            "<th colspan='2'>Bangunan Bawah</th>"+
            "</tr>"+
            "<tr>"+
            "<th>Konstruksi</th>"+
            "<th>Kondisi</th>"+
            "<th>Konstruksi</th>"+
            "<th>Kondisi</th>"+
            "</tr>"+
            "</thead>"+
            "<tboby>"+
            "<tr>"+
            "<td>Btn</td>"+
            "<td>Btn2</td>"+
            "<td>ads</td>"+
            "<td>asd</td>"+
            "</tr>"+
            "</tboby>"+

            "</table>"+
            "</div>"+
            "</div>";

            google.maps.event.addListener(markerJalanUtama, 'click', (function(markerJalanUtama, i) {
                return function() {
                    infowindow.setContent(contentString);
                    infowindow.open(peta, markerJalanUtama);
                }
            })(markerJalanUtama, i));

        }
	</script>
@endsection


@section('content')
	<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="{{base_url('superuser')}}"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="#">Jembatan</a></li>
						</ul>
					</div>
				</div>

				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Lokasi Jembatan</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
							<div id="map" style="width: 100%;height: 700px;">

							</div>
						    {{--<div>--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-md-6"><img src="http://cdn2.tstatic.net/palembang/foto/bank/images/penutupan-jalan-di-depan-pasar-cinde-palembang-senin-1382018_20180813_093853.jpg" style="height: 100px;width: 100px" alt=""></div>--}}
                                    {{--<div class="col-md-6">qwe</div>--}}
                                {{--</div>--}}
                                {{--<div class="row">--}}
                                    {{--<table class="table table-bordered">--}}
                                        {{--<thead>--}}
                                            {{--<tr>--}}
                                                {{--<th colspan="2">Bangunan Atas</th>--}}
                                                {{--<th colspan="2">Bangunan Bawah</th>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<th>Konstruksi</th>--}}
                                                {{--<th>Kondisi</th>--}}
                                                {{--<th>Konstruksi</th>--}}
                                                {{--<th>Kondisi</th>--}}
                                            {{--</tr>--}}
                                        {{--</thead>--}}
                                        {{--<tboby>--}}
                                            {{--<tr>--}}
                                                {{--<td>Btn</td>--}}
                                                {{--<td>Btn2</td>--}}
                                                {{--<td>ads</td>--}}
                                                {{--<td>asd</td>--}}
                                            {{--</tr>--}}
                                        {{--</tboby>--}}

                                    {{--</table>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>

					</div>
					<!-- /basic datatable -->					

				</div>
				<!-- /content area -->

			</div>
@endsection