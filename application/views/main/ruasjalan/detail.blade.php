@extends('main.template')
@section('title')
Dashboard - Administrasi
@endsection
@section('style')
	<style>
		#legend {
			font-family: Arial, sans-serif;
			padding: 4px;
			margin: 4px;
			color:#FFF;
			text-shadow:2px 2px 2px #000;
			-webkit-box-shadow: -1px 1px 2px 0px rgba(256, 256, 256, 0.75);
			-moz-box-shadow: -1px 1px 2px 0px rgba(256, 256, 256, 0.75);
			box-shadow: -1px 1px 2px 0px rgba(256, 256, 256, 0.75);
		}
	</style>
@endsection


@section('mainjs')
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2a2DNEaBiNUdL5Q0Lv6JLCBhs12375c0&libraries=places"></script>
@endsection


@section('corejs')
	<script type="text/javascript" src="{{base_url()}}assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/pages/form_inputs.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/pages/form_select2.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/pages/datatables_basic.js"></script>
	<script>
        var peta = new google.maps.Map(document.getElementById('map'), {
            zoom: 24,
            center: {lat: -7.120311558236223, lng:112.41561233997345},
            mapTypeId: google.maps.MapTypeId.SATELLITE
        });

        //Draw Line
        $.ajax({
            url: "{{base_url("main/detailmap/").$jalan->jalan_id}}",
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
                    var datasCoordinates = [];
                    peta.setCenter(new google.maps.LatLng(datas[0].lat, datas[0].lng));
                    for (var i = 0;i<datas.length;i++){
                        var latlng = new google.maps.LatLng(datas[i].lat,datas[i].lng);
                        datasCoordinates.push(latlng);
                        var text = i+1+". KM : "+datas[i].jalan_pointer_km+","+datas[i].lat+","+datas[i].lng;
                        drawMarker(latlng,i,text);
                    }
                    drawRute(datasCoordinates);
                }
            })
            .fail(function() {
                console.log("salah");
            });

        var legend = document.getElementById('legend');
        var div = document.createElement('div');
        div.innerHTML = '<p>{{$jalan->jalan_no_ruas}}</p><p style="margin-top:-7px;"><?php echo "Panjang : {$jalan->jalan_panjang2} KM";?></p>';
        legend.appendChild(div);
        console.log(legend);
        peta.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);


        function drawRute(rute) {
            var lineMain = new google.maps.Polyline({
                path: rute,
                strokeOpacity: 0,
                icons: [{
                    icon: {
                        path: 'M 0,-1 0,1',
                        strokeColor: '#FFF',
                        strokeOpacity: 0.8,
                        strokeWeight: 10
                    },
                    repeat: '10px'
                }],
                map: peta
            });

            // lineMain.setMap(peta);
        }

        var infowindow = new google.maps.InfoWindow();
        var markerJalanUtama;
        function drawMarker(rute,i,msg) {
            markerJalanUtama = new google.maps.Marker({
                position: rute,
                map: peta,
                icon : {
                    labelOrigin: new google.maps.Point(16,35),
                    url: "{{base_url()."/assets/imagemain/map-pointer-icon.png"}}"
                },
                label: {
                    text: String(i+1),
                    color: '#FFF',
                    fontWeight: 'bold'
                }
            });

            google.maps.event.addListener(markerJalanUtama, 'click', (function(markerJalanUtama, i) {
                return function() {
                    infowindow.setContent(msg);
                    infowindow.open(peta, markerJalanUtama);
                }
            })(markerJalanUtama, i));

        }

        var infowindowRuas = new google.maps.InfoWindow();
        var markerRuas;
        function drawMarkerRuas(rute,i,msg) {
            markerRuas = new google.maps.Marker({
                position: rute,
                map: peta,
                icon : "{{base_url()."assets/imagemain/map-marker-icon.png"}}",
                // label: {
                //     text: String(i+1),
                //     color: '#FFF',
                //     fontWeight: 'bold'
                // }
            });

            console.log("ikkp",markerRuas);

            google.maps.event.addListener(markerRuas, 'click', (function(markerRuas, i) {
                return function() {
                    infowindowRuas.setContent(msg);
                    infowindowRuas.open(peta, markerRuas);
                }
            })(markerRuas, i));
        }


        //
        $(document).ready(function() {
            $(".OpenRuas").on('click', function(){
                console.log("INI",$('#tableKondisi tbody tr').remove());
                var idruas = $(this).attr("idruas");

                $.ajax({
                    url: "{{base_url("main/ruasmap/").$jalan->jalan_id}}/"+idruas,
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
                        var datasCoordinates = [];
                        peta.setCenter(new google.maps.LatLng(datas[0].jalan_kondisi_detail_lat, datas[0].jalan_kondisi_detail_lng));

                        for (var i = 0;i<datas.length;i++){
                            var latlng = new google.maps.LatLng(datas[i].jalan_kondisi_detail_lat,datas[i].jalan_kondisi_detail_lng);
                            var text = datas[i].jalan_kondisi_tipe+"-"+datas[i].jalan_kondisi_nama+" | "+datas[i].jalan_kondisi_detail_lat+","+datas[i].jalan_kondisi_detail_lng;
                            datasCoordinates.push(latlng);
                            // alert(text)
                            $('#tableKondisi tbody').append('<tr><td>'+(i+1)+'</td><td>'+datas[i].jalan_kondisi_detail_lat+','+datas[i].jalan_kondisi_detail_lng+'</td><td>'+datas[i].jalan_kondisi_detail_km+'</td></tr');
                            drawMarkerRuas(latlng,i,text);
                        }
                        // alert(datasCoordinates);
                        drawRuteRuas(datasCoordinates,datas[0].jalan_kondisi_nama);
                        $("#DetailKondisi").show();
                        var judul = $("#DetailKondisi").find("#judulKondisi");
                        // var table = $("#DetailKondisi").find("#tableKondisi");
                        judul.html(datas[0].jalan_kondisi_tipe+" "+datas[0].jalan_kondisi_nama);


                        // console.log("ikko",table);
                    }else{
                        alert(data.Meta.Message);
                    }
                })
                .fail(function() {
                    console.log("salah");
                });
            });
        });

        function drawRuteRuas(rute,kondisi) {
            console.log("Ikko",kondisi);
            var lineRuas = new google.maps.Polyline({
                path: rute,
                strokeColor: colorKondisi(kondisi),
                strokeOpacity: 0.8,
                strokeWeight: 10,
                map: peta,
                visible: true
            });

            console.log(peta);
        }

        function colorKondisi(kondisi) {
            var color = "#FFF";
            switch(kondisi) {
                case "BAIK":
                    color = "#009900";
                    break;
                case "RUSAK RINGAN":
                    color = "#FF0";
                    break;
                case "RUSAK SEDANG":
                    color = "#F60";
                    break;
                case "RUSAK BERAT":
                    color = "#F00";
                    break;
                default:
                    color = "#FFF";
            }

            return color;

        }
    </script>
@endsection

@section('header')
	<!-- Page header default -->
	<div class="content-group border-top-lg border-top-primary">
		<div class="page-header page-header-default" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
			<div class="page-header-content">
				<div class="page-title" align="center">
					<h4><a href="{{base_url('main/ruasjalan')}}"><i class="icon-arrow-left52 position-left"></i></a> <span class="text-semibold">{{$jalan->jalan_no_ruas}}.{{$jalan->jalan_nama}} - {{$jalan->jalan_nama_ujung}}</span> ({{$jalan->jalan_panjang2 - $jalan->jalan_panjang1}} KM)</h4>
				</div>
			</div>


		</div>
	</div>
	<!-- /page header default -->
@endsection

@section('content')



	<style>
		.page-container {
			padding: 20px;
		}
	</style>

	<!-- Main content -->
	<div class="content-wrapper">

		<div class="row">
			<div class="col-lg-3">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">JALAN UTAMA</h5>
						<div class="heading-elements">
							<ul class="icons-list">
								<li><a data-action="collapse"></a></li>
								{{--<li><a data-action="close"></a></li>--}}
							</ul>
						</div>
					</div>

					{{--<div class="panel-body">--}}
					{{--Starter pages include the most basic components that may help you start your development process - basic grid example, panel, table and form layouts with standard components. Nothing extra.--}}
					{{--</div>--}}

					<div class="table-responsive">
						<table class="table datatable-basic table-striped table-xs table-hover">
							<thead>
							<tr>
								<th>No</th>
								<th>Posisi</th>
								<th>KM</th>
								{{--<th class="text-center">AKSI</th>--}}
							</tr>
							</thead>
							<tbody>

							@foreach($jalanpointer as $i => $row)
								<tr>
									<td>{{$i+1}}</td>
									<td>{{$row->jalan_pointer_lat}},{{$row->jalan_pointer_lng}}</td>
									<td>{{$row->jalan_pointer_km}}</td>
									{{--<td>--}}
										{{--<div class="btn-group">--}}
											{{--<button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown"><i class="icon-cog5 position-left"></i> Action <span class="caret"></span></button>--}}
											{{--<ul class="dropdown-menu dropdown-menu-right">--}}
												{{--<li>--}}
													{{--<a href="{{base_url('superuser/responden/update/'.$row->jalan_id)}}">--}}
														{{--<i class="fa fa-edit"></i> Detail Ruas Jalan--}}
													{{--</a>--}}
												{{--</li>--}}
												{{--<li><a href="javascript:void(0)" onclick="deleteIt(this)"--}}
													   {{--data-url="{{base_url('superuser/responden/deleted/'.$row->jalan_id)}}">--}}
														{{--<i class="fa fa-trash"></i> Informasi Ruas--}}
													{{--</a>--}}
												{{--</li>--}}
											{{--</ul>--}}
										{{--</div>--}}
									{{--</td>--}}
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">RUAS JALAN</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    {{--<li><a data-action="close"></a></li>--}}
                                </ul>
                            </div>
                        </div>

                        {{--<div class="panel-body">--}}
                        {{--Starter pages include the most basic components that may help you start your development process - basic grid example, panel, table and form layouts with standard components. Nothing extra.--}}
                        {{--</div>--}}

                        <div class="table-responsive">
                            <table class="table datatable-basic table-striped table-xs table-responsive table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tipe</th>
                                    <th>Kondisi</th>
                                    <th>Lebar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($jalanruas as $i => $row)
                                    <tr>
                                        <td>{{$i+1}}.&nbsp;<a href="javascript:void(0)" class="OpenRuas" idruas="{{$row->jalan_kondisi_id}}"><i class="icon-eye8"></i></a></td>
                                        <td>{{$row->jalan_kondisi_tipe}}</td>
                                        <td>{{$row->jalan_kondisi_nama}}</td>
                                        <td>{{$row->jalan_kondisi_lebar}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
                <div id="DetailKondisi" style="display: none" class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title" id="judulKondisi">RUAS JALAN</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    {{--<li><a data-action="close"></a></li>--}}
                                </ul>
                            </div>
                        </div>

                        {{--<div class="panel-body">--}}
                        {{--Starter pages include the most basic components that may help you start your development process - basic grid example, panel, table and form layouts with standard components. Nothing extra.--}}
                        {{--</div>--}}

                        <div class="table-responsive">
                            <table id="tableKondisi" class="table table-striped table-xs table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Posisi</th>
                                    <th>KM</th>
                                </tr>
                                </thead>
                                <tbody id="tbodyKondisi">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>


			</div>
			<div class="col-lg-6">
                <div class="row">
                    <div class="col-md-2">
                        <a href="{{base_url('main/fotojalan/'.$jalan->jalan_id)}}">
                            <button type="button" class="btn bg-primary-400 btn-labeled"><b><i class="icon-camera"></i></b> Foto</button>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{base_url('main/informasi_ruas/'.$row->jalan_id)}}">
                            <button type="button" class="btn bg-primary-400 btn-labeled"><b><i class="icon-file-presentation"></i></b> Informasi Ruas</button>
                        </a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div id="map" class="panel panel-flat" style="width:100%;height:600px;"></div>
                    <div id="legend"></div>
                </div>

			</div>
		</div>



	</div>
@endsection