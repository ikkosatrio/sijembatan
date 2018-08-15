<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=rekap_ruas_jalan.xls");
?>	<div class="content-wrapper">

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
					</div>
					<div class="table-responsive">
					<table border="1" class="table table-bordered datatable-basic table-striped table-condensed">
						<thead>
							<tr>
							  	<th rowspan="4" style="text-align:center">NO.</th>
                            	<th rowspan="4" style="text-align:center">NO. RUAS</th>
                                <th colspan="2" rowspan="4" style="text-align:center">NAMA RUAS</th> 
                                <th rowspan="4" style="text-align:center">KECAMATAN YG DILALUI</th>
                                <th rowspan="4" style="text-align:center">PANJANG (KM)</th>
                                <th colspan="40" style="text-align:center">TIPE JALAN</th>  
                            </tr>
							<tr>
                                <th colspan="8" style="text-align:center">LASTON</th>
                                <th colspan="8" style="text-align:center">CBC</th>
                                <th colspan="8" style="text-align:center">PAVINGSTONE</th>
                                <th colspan="8" style="text-align:center">LAPEN</th>
                                <th colspan="8" style="text-align:center">MAKADAM</th>
                          	</tr>
							<tr>
                                <th colspan="2" style="text-align:center">B</th>
                                <th colspan="2" style="text-align:center">RR</th>
                                <th colspan="2" style="text-align:center">RS</th>
                                <th colspan="2" style="text-align:center">RB</th>
                                <th colspan="2" style="text-align:center">B</th>
                                <th colspan="2" style="text-align:center">RR</th>
                                <th colspan="2" style="text-align:center">RS</th>
                                <th colspan="2" style="text-align:center">RB</th>
                                <th colspan="2" style="text-align:center">B</th>
                                <th colspan="2" style="text-align:center">RR</th>
                                <th colspan="2" style="text-align:center">RS</th>
                                <th colspan="2" style="text-align:center">RB</th>
                                <th colspan="2" style="text-align:center">B</th>
                                <th colspan="2" style="text-align:center">RR</th>
                                <th colspan="2" style="text-align:center">RS</th>
                                <th colspan="2" style="text-align:center">RB</th>
                                <th colspan="2" style="text-align:center">B</th>
                                <th colspan="2" style="text-align:center">RR</th>
                                <th colspan="2" style="text-align:center">RS</th>
                                <th colspan="2" style="text-align:center">RB</th>
                            </tr>
							<tr>
                            	<th style="text-align:center">KM</th>
                                <th style="text-align:center">%</th>
                                <th style="text-align:center">KM</th>
                                <th style="text-align:center">%</th>
                                <th style="text-align:center">KM</th>
                                <th style="text-align:center">%</th>
                                <th style="text-align:center">KM</th>
                                <th style="text-align:center">%</th>
                                <th style="text-align:center">KM</th>
                                <th style="text-align:center">%</th>
                                <th style="text-align:center">KM</th>
                                <th style="text-align:center">%</th>
                                <th style="text-align:center">KM</th>
                                <th style="text-align:center">%</th>
                                <th style="text-align:center">KM</th>
                                <th style="text-align:center">%</th>
                                <th style="text-align:center">KM</th>
                                <th style="text-align:center">%</th>
                                <th style="text-align:center">KM</th>
                                <th style="text-align:center">%</th>
                                <th style="text-align:center">KM</th>
                                <th style="text-align:center">%</th>
                                <th style="text-align:center">KM</th>
                                <th style="text-align:center">%</th>
                                <th style="text-align:center">KM</th>
                                <th style="text-align:center">%</th>
                                <th style="text-align:center">KM</th>
                                <th style="text-align:center">%</th>
                                <th style="text-align:center">KM</th>
                                <th style="text-align:center">%</th>
                                <th style="text-align:center">KM</th>
                                <th style="text-align:center">%</th>
                                <th style="text-align:center">KM</th>
                                <th style="text-align:center">%</th>
                                <th style="text-align:center">KM</th>
                                <th style="text-align:center">%</th>
                                <th style="text-align:center">KM</th>
                                <th style="text-align:center">%</th>
                                <th style="text-align:center">KM</th>
                                <th style="text-align:center">%</th>                                            
					      	</tr>
                            <tr>
                              	<th style="text-align:center">1</th>
                                <th style="text-align:center">2</th>
                                <th colspan="2" style="text-align:center">3</th>
                                <th style="text-align:center">4</th>
                                <th style="text-align:center">5</th>
                                <th style="text-align:center">6</th>
                                <th style="text-align:center">7</th>
                                <th style="text-align:center">8</th>
                                <th style="text-align:center">9</th>
                                <th style="text-align:center">10</th>
                                <th style="text-align:center">11</th>
                                <th style="text-align:center">12</th>
                                <th style="text-align:center">13</th>
                                <th style="text-align:center">14</th>
                                <th style="text-align:center">15</th>
                                <th style="text-align:center">16</th>
                                <th style="text-align:center">17</th>
                                <th style="text-align:center">18</th>
                                <th style="text-align:center">19</th>
                                <th style="text-align:center">20</th>
                                <th style="text-align:center">21</th>
                                <th style="text-align:center">22</th>
                                <th style="text-align:center">23</th>
                                <th style="text-align:center">24</th>
                                <th style="text-align:center">25</th>
                                <th style="text-align:center">26</th>
                                <th style="text-align:center">27</th>
                                <th style="text-align:center">28</th>
                                <th style="text-align:center">29</th>
                                <th style="text-align:center">30</th>
                                <th style="text-align:center">31</th>
                                <th style="text-align:center">32</th>
                                <th style="text-align:center">33</th>
                                <th style="text-align:center">34</th>
                                <th style="text-align:center">35</th>
                                <th style="text-align:center">36</th>
                                <th style="text-align:center">37</th>
                                <th style="text-align:center">38</th>
                                <th style="text-align:center">39</th>
                                <th style="text-align:center">40</th>
                                <th style="text-align:center">41</th>
                                <th style="text-align:center">42</th>
                                <th style="text-align:center">43</th>
                                <th style="text-align:center">44</th>
                                <th style="text-align:center">45</th>
                            </tr>
						</thead>
						<tbody>
                            @php
                                $panjang_total = "";

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
	                    	@foreach($laporan as $key => $lap)

                                @php

                                    //susun nama kecamatan
                                    $namakecamatan =  "";
                                    if ($lap->Kecamatan1){
                                        $namakecamatan = $lap->Kecamatan1->kecamatan_nama;
                                    }
                                    if ($lap->Kecamatan2){
                                        $namakecamatan = $namakecamatan.",".$lap->Kecamatan2->kecamatan_nama;
                                    }
                                    if ($lap->Kecamatan3){
                                        $namakecamatan = $namakecamatan.",".$lap->Kecamatan3->kecamatan_nama;
                                    }

                                    //PANJANG
                                    $panjang = $lap->jalan_panjang2 - $lap->jalan_panjang1;
                                    $panjang_total += $panjang;


                                    //TIPEJALAN

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
                                    <td style="text-align:center;">{{$key+1}}</td>
                                    <td style="text-align:center;">{{$lap->jalan_no_ruas}}</td>
                                    <td>{{$lap->jalan_nama}}</td>
                                    <td>{{$lap->jalan_nama_ujung}}</td>
                                    <td>{{$namakecamatan}}</td>
                                    <td style="text-align:right;">{{number_format($panjang,3,'.','')}}</td>

                                    <td style="text-align:right;">{{number_format($lap->LastonB,3,'.','')}}</td>
                                    <td style="color: red; text-align:right;">{{($lap->LastonB > 0)?number_format((($lap->LastonB)/$panjang)*100,3,'.',''):number_format(0,3,'.','')}}</td>
                                    <td>{{$lap->LastonRR}}</td>
                                    <td  style="color: red; text-align:right;">{{($lap->LastonRR > 0)?number_format((($lap->LastonRR)/$panjang)*100,3,'.',''):number_format(0,3,'.','')}}</td>
                                    <td>{{$lap->LastonRS}}</td>
                                    <td  style="color: red; text-align:right;">{{($lap->LastonRS > 0)?number_format((($lap->LastonRS)/$panjang)*100,3,'.',''):number_format(0,3,'.','')}}</td>
                                    <td>{{$lap->LastonRB}}</td>
                                    <td  style="color: red; text-align:right;">{{($lap->LastonRB > 0)?number_format((($lap->LastonRB)/$panjang)*100,3,'.',''):number_format(0,3,'.','')}}</td>


                                    <td>{{$lap->CBCB}}</td>
                                    <td  style="color: red; text-align:right;">{{($lap->CBCB > 0)?number_format((($lap->CBCB)/$panjang)*100,3,'.',''):number_format(0,3,'.','')}}</td>
                                    <td>{{$lap->CBCRR}}</td>
                                    <td  style="color: red; text-align:right;">{{($lap->CBCRR > 0)?number_format((($lap->CBCRR)/$panjang)*100,3,'.',''):number_format(0,3,'.','')}}</td>
                                    <td>{{$lap->CBCRS}}</td>
                                    <td  style="color: red; text-align:right;">{{($lap->CBCRS > 0)?number_format((($lap->CBCRS)/$panjang)*100,3,'.',''):number_format(0,3,'.','')}}</td>
                                    <td>{{$lap->CBCRB}}</td>
                                    <td  style="color: red; text-align:right;">{{($lap->CBCRB > 0)?number_format((($lap->CBCRB)/$panjang)*100,3,'.',''):number_format(0,3,'.','')}}</td>


                                    <td>{{$lap->PavingB}}</td>
                                    <td style="color: red; text-align:right;">{{($lap->PavingB > 0)?number_format((($lap->PavingB)/$panjang)*100,3,'.',''):number_format(0,3,'.','')}}</td>
                                    <td>{{$lap->PavingRR}}</td>
                                    <td  style="color: red; text-align:right;">{{($lap->PavingRR > 0)?number_format((($lap->PavingRR)/$panjang)*100,3,'.',''):number_format(0,3,'.','')}}</td>
                                    <td>{{$lap->PavingRS}}</td>
                                    <td style="color: red; text-align:right;">{{($lap->PavingRS > 0)?number_format((($lap->PavingRS)/$panjang)*100,3,'.',''):number_format(0,3,'.','')}}</td>
                                    <td>{{$lap->PavingRB}}</td>
                                    <td style="color: red; text-align:right;">{{($lap->PavingRB > 0)?number_format((($lap->PavingRB)/$panjang)*100,3,'.',''):number_format(0,3,'.','')}}</td>


                                    <td>{{$lap->LapenB}}</td>
                                    <td style="color: red; text-align:right;">{{($lap->LapenB > 0)?number_format((($lap->LapenB)/$panjang)*100,3,'.',''):number_format(0,3,'.','')}}</td>
                                    <td>{{$lap->LapenRR}}</td>
                                    <td style="color: red; text-align:right;">{{($lap->LapenRR > 0)?number_format((($lap->LapenRR)/$panjang)*100,3,'.',''):number_format(0,3,'.','')}}</td>
                                    <td>{{$lap->LapenRS}}</td>
                                    <td style="color: red; text-align:right;">{{($lap->LapenRS > 0)?number_format((($lap->LapenRS)/$panjang)*100,3,'.',''):number_format(0,3,'.','')}}</td>
                                    <td>{{$lap->LapenRB}}</td>
                                    <td style="color: red; text-align:right;">{{($lap->LapenRB > 0)?number_format((($lap->LapenRB)/$panjang)*100,3,'.',''):number_format(0,3,'.','')}}</td>


                                    <td>{{$lap->MakadamB}}</td>
                                    <td style="color: red; text-align:right;">{{($lap->MakadamB > 0)?number_format((($lap->MakadamB)/$panjang)*100,3,'.',''):number_format(0,3,'.','')}}</td>
                                    <td>{{$lap->MakadamRR}}</td>
                                    <td style="color: red; text-align:right;">{{($lap->MakadamRR > 0)?number_format((($lap->MakadamRR)/$panjang)*100,3,'.',''):number_format(0,3,'.','')}}</td>
                                    <td>{{$lap->MakadamRS}}</td>
                                    <td style="color: red; text-align:right;">{{($lap->MakadamRS > 0)?number_format((($lap->MakadamRS)/$panjang)*100,3,'.',''):number_format(0,3,'.','')}}</td>
                                    <td>{{$lap->MakadamRB}}</td>
                                    <td style="color: red; text-align:right;">{{($lap->MakadamRB > 0)?number_format((($lap->MakadamRB)/$panjang)*100,3,'.',''):number_format(0,3,'.','')}}</td>

                                </tr>
	                        @endforeach
						</tbody>
                        <tfoot>
                        <tr style="font-weight: bold;">
                            <td colspan="5" style="color: black; font-weight: bold;" align="right">Total Panjang Jalan & Presentase</td>
                            <td>{{$panjang_total}}</td>
                            <td>{{number_format($totalLastonB,3,'.','.')}}</td>
                            <td style="color: red">{{number_format(($totalLastonB/$panjang_total)*100,3,'.','.')}}</td>
                            <td>{{number_format($totalLastonRR,3,'.','.')}}</td>
                            <td style="color: red">{{number_format(($totalLastonRR/$panjang_total)*100,3,'.','.')}}</td>
                            <td>{{number_format($totalLapenRS,3,'.','.')}}</td>
                            <td style="color: red">{{number_format(($totalLastonRS/$panjang_total)*100,3,'.','.')}}</td>
                            <td>{{number_format($totalLastonRB,3,'.','.')}}</td>
                            <td style="color: red">{{number_format(($totalLastonRB/$panjang_total)*100,3,'.','.')}}</td>


                            <td>{{number_format($totalCBCB,3,'.','.')}}</td>
                            <td style="color: red">{{number_format(($totalCBCB/$panjang_total)*100,3,'.','.')}}</td>
                            <td>{{number_format($totalCBCRR,3,'.','.')}}</td>
                            <td style="color: red">{{number_format(($totalCBCRR/$panjang_total)*100,3,'.','.')}}</td>
                            <td>{{number_format($totalCBCRS,3,'.','.')}}</td>
                            <td style="color: red">{{number_format(($totalCBCRS/$panjang_total)*100,3,'.','.')}}</td>
                            <td>{{number_format($totalCBCRR,3,'.','.')}}</td>
                            <td style="color: red">{{number_format(($totalCBCRR/$panjang_total)*100,3,'.','.')}}</td>


                            <td>{{number_format($totalPavingB,3,'.','.')}}</td>
                            <td style="color: red">{{number_format(($totalPavingB/$panjang_total)*100,3,'.','.')}}</td>
                            <td>{{number_format($totalPavingRR,3,'.','.')}}</td>
                            <td style="color: red">{{number_format(($totalPavingRR/$panjang_total)*100,3,'.','.')}}</td>
                            <td>{{number_format($totalPavingRS,3,'.','.')}}</td>
                            <td style="color: red">{{number_format(($totalPavingRS/$panjang_total)*100,3,'.','.')}}</td>
                            <td>{{number_format($totalPavingRB,3,'.','.')}}</td>
                            <td style="color: red">{{number_format(($totalPavingRB/$panjang_total)*100,3,'.','.')}}</td>


                            <td>{{number_format($totalLapenB,3,'.','.')}}</td>
                            <td style="color: red">{{number_format(($totalLapenB/$panjang_total)*100,3,'.','.')}}</td>

                            <td>{{number_format($totalLapenRR,3,'.','.')}}</td>
                            <td style="color: red">{{number_format(($totalLapenRR/$panjang_total)*100,3,'.','.')}}</td>

                            <td>{{number_format($totalLapenRS,3,'.','.')}}</td>
                            <td style="color: red">{{number_format(($totalLapenRS/$panjang_total)*100,3,'.','.')}}</td>

                            <td>{{number_format($totalLapenRB,3,'.','.')}}</td>
                            <td style="color: red">{{number_format(($totalLapenRB/$panjang_total)*100,3,'.','.')}}</td>

                            <td>{{number_format($totalMakadamB,3,'.','.')}}</td>
                            <td style="color: red">{{number_format(($totalMakadamB/$panjang_total)*100,3,'.','.')}}</td>
                            <td>{{number_format($totalMakadamRR,3,'.','.')}}</td>
                            <td style="color: red">{{number_format(($totalMakadamRR/$panjang_total)*100,3,'.','.')}}</td>
                            <td>{{number_format($totalMakadamRS,3,'.','.')}}</td>
                            <td style="color: red">{{number_format(($totalMakadamRS/$panjang_total)*100,3,'.','.')}}</td>
                            <td>{{number_format($totalMakadamRB,3,'.','.')}}</td>
                            <td style="color: red">{{number_format(($totalMakadamRB/$panjang_total)*100,3,'.','.')}}</td>
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