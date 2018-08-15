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

				<div class="content">
					<!-- Dashboard content -->

		<!-- Page content -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">
                        <a href="{{base_url('main/export_ruas/'.$id)}}">
                        @foreach($jalan as $i => $row)
                        <button type="button" class="btn btn-success btn-sm">Export Rekap Ruas {{$row->jalan_nama}} - {{$row->jalan_nama_ujung}}<i class="icon-database-export position-right"></i></button>
                        @endforeach
                        </a>
						</h4>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                	</ul>
	                	</div>
					</div>
                    <div class="table-responsive">
					    <table class="table table-striped datatable-basic table-bordered table-xs table-hover">
						<thead>
							<tr>
                                <th></th>
                                <th colspan="4" style="text-align:center">LASTON (M)</th>
                                <th colspan="4" style="text-align:center">CBC (M)</th>
                                <th colspan="4" style="text-align:center">PAVINGSTONE (M)</th>
                                <th colspan="4" style="text-align:center">LAPEN (M)</th>
                                <th colspan="4" style="text-align:center">MAKADAM (M)</th>
                                <th style="text-align:center">TOTAL PANJANG</th>
                            </tr>
                            <tr>
                                <th>Lebar</th>
                                <th style="text-align:center">B</th>
                                <th style="text-align:center">RR</th>
                                <th style="text-align:center">RS</th>
                                <th style="text-align:center">RB</th>
                                <th style="text-align:center">B</th>
                                <th style="text-align:center">RR</th>
                                <th style="text-align:center">RS</th>
                                <th style="text-align:center">RB</th>
                                <th style="text-align:center">B</th>
                                <th style="text-align:center">RR</th>
                                <th style="text-align:center">RS</th>
                                <th style="text-align:center">RB</th>
                                <th style="text-align:center">B</th>
                                <th style="text-align:center">RR</th>
                                <th style="text-align:center">RS</th>
                                <th style="text-align:center">RB</th>
                                <th style="text-align:center">B</th>
                                <th style="text-align:center">RR</th>
                                <th style="text-align:center">RS</th>
                                <th style="text-align:center">RB</th>
                                <th style="text-align:center">&nbsp;</th>
                            </tr>
                            <tr>
                                <th style="text-align:center">a</th>
                                <th style="text-align:center">b</th>
                                <th style="text-align:center">c</th>
                                <th style="text-align:center">d</th>
                                <th style="text-align:center">e</th>
                                <th style="text-align:center">f</th>
                                <th style="text-align:center">g</th>
                                <th style="text-align:center">h</th>
                                <th style="text-align:center">i</th>
                                <th style="text-align:center">j</th>
                                <th style="text-align:center">k</th>
                                <th style="text-align:center">l</th>
                                <th style="text-align:center">m</th>
                                <th style="text-align:center">n</th>
                                <th style="text-align:center">o</th>
                                <th style="text-align:center">p</th>
                                <th style="text-align:center">q</th>
                                <th style="text-align:center">r</th>
                                <th style="text-align:center">s</th>
                                <th style="text-align:center">t</th>
                                <th style="text-align:center">u</th>
                                <th style="text-align:center">v</th>
                            </tr>
						</thead>
						<tbody>
                            @php
                                $totalLastonB = 0;
                                $totalLastonRR = 0;
                                $totalLastonRS = 0;
                                $totalLastonRB = 0;

                                $totalCBCB = 0;
                                $totalCBCRR = 0;
                                $totalCBCRS = 0;
                                $totalCBCRB = 0;

                                $totalPavingB = 0;
                                $totalPavingRR = 0;
                                $totalPavingRS = 0;
                                $totalPavingRB = 0;

                                $totalLapenB = 0;
                                $totalLapenRR = 0;
                                $totalLapenRS = 0;
                                $totalLapenRB = 0;

                                $totalMakadamB = 0;
                                $totalMakadamRR = 0;
                                $totalMakadamRS = 0;
                                $totalMakadamRB = 0;
                                $total = 0;

                            @endphp
                            @foreach($laporan as $lap)

                                @php
                                    $totalLastonB += $lap->LastonB;
                                    $totalLastonRR += $lap->LastonRR;
                                    $totalLastonRS += $lap->LastonRS;
                                    $totalLastonRB += $lap->LastonRB;

                                    $totalCBCB += $lap->CBCB;
                                    $totalCBCRR += $lap->CBCRR;
                                    $totalCBCRS += $lap->CBCRS;
                                    $totalCBCRB += $lap->CBCRB;

                                    $totalPavingB += $lap->PavingB;
                                    $totalPavingRR += $lap->PavingRR;
                                    $totalPavingRS += $lap->PavingRS;
                                    $totalPavingRB += $lap->LapenRB;

                                    $totalLapenB += $lap->LapenB;
                                    $totalLapenRR += $lap->LapenRR;
                                    $totalLapenRS += $lap->LapenRS;
                                    $totalLapenRB += $lap->LapenRB;

                                    $totalMakadamB += $lap->MakadamB;
                                    $totalMakadamRR += $lap->MakadamRR;
                                    $totalMakadamRS += $lap->MakadamRS;
                                    $totalMakadamRB += $lap->MakadamRB;

                                @endphp

                                <tr>
                                    <td>{{$lap->SumLebar}}</td>
                                    <td>{{$lap->LastonB}}</td>
                                    <td>{{$lap->LastonRR}}</td>
                                    <td>{{$lap->LastonRS}}</td>
                                    <td>{{$lap->LastonRB}}</td>
                                    <td>{{$lap->CBCB}}</td>
                                    <td>{{$lap->CBCRR}}</td>
                                    <td>{{$lap->CBCRS}}</td>
                                    <td>{{$lap->CBCRB}}</td>
                                    <td>{{$lap->PavingB}}</td>
                                    <td>{{$lap->PavingRR}}</td>
                                    <td>{{$lap->PavingRS}}</td>
                                    <td>{{$lap->PavingRB}}</td>
                                    <td>{{$lap->LapenB}}</td>
                                    <td>{{$lap->LapenRR}}</td>
                                    <td>{{$lap->LapenRS}}</td>
                                    <td>{{$lap->LapenRB}}</td>
                                    <td>{{$lap->MakadamB}}</td>
                                    <td>{{$lap->MakadamRR}}</td>
                                    <td>{{$lap->MakadamRS}}</td>
                                    <td>{{$lap->MakadamRB}}</td>
                                    <td>{{$lap->PanjangRuas}}</td>
                                </tr>
                            @endforeach
						</tbody>
                        <tfoot>
                        <tr>
                            <td></td>
                            <td>{{$totalLastonB}}</td>
                            <td>{{$totalLastonRR}}</td>
                            <td>{{$totalLastonRS}}</td>
                            <td>{{$totalLastonRB}}</td>
                            <td>{{$totalCBCB}}</td>
                            <td>{{$totalCBCRR}}</td>
                            <td>{{$totalCBCRS}}</td>
                            <td>{{$totalCBCRB}}</td>
                            <td>{{$totalPavingB}}</td>
                            <td>{{$totalPavingRR}}</td>
                            <td>{{$totalPavingRS}}</td>
                            <td>{{$totalPavingRB}}</td>
                            <td>{{$totalLapenB}}</td>
                            <td>{{$totalLapenRR}}</td>
                            <td>{{$totalLapenRS}}</td>
                            <td>{{$totalLapenRB}}</td>
                            <td>{{$totalMakadamB}}</td>
                            <td>{{$totalMakadamRR}}</td>
                            <td>{{$totalMakadamRS}}</td>
                            <td>{{$totalMakadamRB}}</td>
                            <td>{{$total}}</td>
                        </tr>
                        </tfoot>
					</table>
                    </div>
				</div>	
				<!-- /page content -->

					<!-- /dashboard content -->
				</div>
				<!-- /content area -->
	</div>
@endsection
