@extends('email.template')

@section('title')
 INVOICE PEMBELIAN PRODUK - {{ucwords($config->name)}}
@endsection

@section('description')
	Terima Kasih Telah Membeli Produk Kami !
@endsection

@section('header')
	Ini Merupakan Detail Invoice Pembelian / Pemesanan Produk Anda
@endsection

@section('content')
	<tr mc:hideable>
	<td align="center" valign="top">
		<!-- CENTERING TABLE // -->
		<table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#EC3B3B">
			<tr>
				<td align="center" valign="top">
					<!-- FLEXIBLE CONTAINER // -->
					<table border="0" cellspacing="0" width="500" class="flexibleContainer">
						<tr>
							<td valign="top" width="500" class="flexibleContainerCell"  style="padding:8px 30px 8px 30px;">

								<!-- CONTENT TABLE // -->
								<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td align="left" valign="top" class="flexibleContainerBox">
											<table border="0" cellpadding="0" cellspacing="0" width="210" style="max-width: 100%;">
												<tr>
													<td align="left" class="textContent">
														<h5 mc:edit="header" style="color:#ffde93;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">
															Tipe Email
														</h5>
														<div mc:edit="body" style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:12px;margin-bottom:0;color:#FFF;line-height:135%;">Invoice Pembelian</div>
													</td>
												</tr>
											</table>
										</td>
										<td align="right" valign="middle" class="flexibleContainerBox">
											<table class="flexibleContainerBoxNext" border="0" cellpadding="0" cellspacing="0" width="210" style="max-width: 100%;">
												<tr>
													<td align="left" class="textContent">
															<h5 mc:edit="header" style="color:#ffde93;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">
															Tanggal email
														</h5>
														<div mc:edit="body" style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:12px;margin-bottom:0;color:#FFF;line-height:135%;">{{tgl_indo(date('Y-m-d'))}}</div>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<!-- // CONTENT TABLE -->

							</td>
						</tr>
					</table>
					<!-- // FLEXIBLE CONTAINER -->
				</td>
			</tr>
		</table>
		<!-- // CENTERING TABLE -->
	</td>
</tr>
<tr mc:hideable="">
	<td align="center" valign="top">
		<!-- CENTERING TABLE // -->
		<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-bottom:2px dashed#ddd">
			<tbody><tr>
				<td align="center" valign="top">
					<!-- FLEXIBLE CONTAINER // -->
					<table border="0" cellpadding="30" cellspacing="0" width="500" class="flexibleContainer">
						<tbody><tr>
							<td valign="top" width="500" class="flexibleContainerCell">

								<!-- CONTENT TABLE // -->
								<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody><tr>
										<td align="left" valign="top" class="flexibleContainerBox">
											<table border="0" cellpadding="0" cellspacing="0" style="max-width: 100%;">
												<tbody><tr>
													<td align="left" class="textContent">
														<h3 style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:8px;text-align:left;">
															{{ucwords(@$transaksi->name)}}
														</h3>
														<div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:13px;margin-bottom:0;color:#A5A5A5;line-height:135%;">
															<table cellpadding="3">
																<tbody><tr>
																	<td width="120">Email </td>
																	<td>{{@$transaksi->email}}</td>
																</tr>
																<tr>
																	<td width="120">No Telepon</td>
																	<td>{{@$transaksi->phone}}</td>
																</tr>
															</tbody></table>
														</div>
													</td>
												</tr>
											</tbody></table>
										</td>
									</tr>
								</tbody></table>
								<!-- // CONTENT TABLE -->

							</td>
						</tr>
					</tbody></table>
					<!-- // FLEXIBLE CONTAINER -->
				</td>
			</tr>
		</tbody></table>
		<!-- // CENTERING TABLE -->
	</td>
</tr>

<!-- Keranjang -->
<tr mc:hideable="">
	<td align="center" valign="top">
		<!-- CENTERING TABLE // -->
		<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-bottom:2px dashed#ddd">
			<tbody><tr>
				<td align="center" valign="top">
					<!-- FLEXIBLE CONTAINER // -->
					<table border="0" cellpadding="30" cellspacing="0" width="500" class="flexibleContainer">
						<tbody><tr>
							<td valign="top" width="500" class="flexibleContainerCell">

								<!-- CONTENT TABLE // -->
								<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody><tr>
										<td align="left" valign="top" class="flexibleContainerBox">
											<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
												<tbody><tr>
													<td align="left" class="textContent">
														<h3 style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:8px;text-align:left;">
															<span style="color:#EC3B3B">Produk</span> 
															<span style="color:#2B2B2B">Yang Di Beli</span>
														</h3>
														<div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:13px;margin-bottom:0;color:#A5A5A5;line-height:135%;">
															<table style="width:100%;border:1px solid#eee; border-collapse: collapse;" cellpadding="10">
																<thead>
																<tr style="background:#2B2B2B;color:#ffde93">
																	<th width="120">Produk</th>
																	<th>QTY</th>
																	<th>Total</th>
																	<th width="100">Subtotal</th>
																</tr>
																</thead>
																<tbody>
																	@foreach($transaksi->detail as $result)
																	<tr style="border:1px solid#ddd">
																		<td>
																		<a href="{{base_url('buku/satuan/detail/'.$result->product->id.'/'.seo($result->product->name))}}" target="_blank">{{read_more($result->product->name,20)}}</a>
																		<div style="margin-top:10px;font-size:10px;">
																		<br>
																		<span>Weight : {{$result->weight}} Gram</span>
																		</div>
																		</td>
																		<td>{{$result->qty}} Unit</td>
																		<td>
																			Rp. {{number_format($result->price)}} <br>
																			<span style="color:#3c7fea" title="ASURANSI PRODUK">(+)</span> 
																			Rp. {{number_format($result->insurance)}}<br>
																		</td>
																		<td>Rp. {{number_format($result->total)}}</td>
																	</tr>
																	@endforeach																	
																</tbody>
																<tfoot style="background:#424242;color:#fff">
																	<tr style="border:1px solid#555">
																		<td colspan="3" align="right">Jumlah</td>
																		<td>Rp. {{number_format(@$transaksi->price)}}</td>
																	</tr>
																	<tr style="border:1px solid#555">
																		<td colspan="3" align="right">
																			Biaya Pengiriman
																		</td>
																		<td>
																		@if ($transaksi->courierpacket==null)
																		GRATIS
																		@else
																		Rp. {{number_format(goExplode($transaksi->courierpacket,'-',1))}}
																		@endif</td>
																	</tr>
																	<tr style="border:1px solid#555" style="display: none">
																		<td colspan="3" align="right">
																			Biaya Admin
																		</td>
																		<td>Rp. {{number_format($transaksi->admincost)}}</td>
																	</tr>
																	<tr style="border:1px solid#555;background:#EC3B3B;">
																		<td colspan="3" align="right">Total Pembayaran</td>
																		<td>
																			@if ($transaksi->courierpacket==null)
																			Rp. {{number_format($transaksi->price + $transaksi->admincost )}}
																			@else
																		Rp. {{number_format($transaksi->price + goExplode($transaksi->courierpacket,'-',1) + $transaksi->admincost )}}
																			@endif
																		</td>
																	</tr>
																</tfoot>
															</table>
														</div>
													</td>
												</tr>
											</tbody></table>
										</td>
									</tr>
								</tbody></table>
								<!-- // CONTENT TABLE -->

							</td>
						</tr>
					</tbody></table>
					<!-- // FLEXIBLE CONTAINER -->
				</td>
			</tr>
		</tbody></table>
		<!-- // CENTERING TABLE -->
	</td>
</tr>
<!-- End Keranjang -->

<!-- Info Pengiriman -->
<tr mc:hideable="">
	<td align="center" valign="top">
		<!-- CENTERING TABLE // -->
		<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-bottom:2px dashed#ddd">
			<tbody><tr>
				<td align="center" valign="top">
					<!-- FLEXIBLE CONTAINER // -->
					<table border="0" cellpadding="30" cellspacing="0" width="500" class="flexibleContainer">
						<tbody><tr>
							<td valign="top" width="500" class="flexibleContainerCell">

								<!-- CONTENT TABLE // -->
								<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody><tr>
										<td align="left" valign="top" class="flexibleContainerBox">
											<table border="0" cellpadding="0" cellspacing="0" style="max-width: 100%;">
												<tbody><tr>
													<td align="left" class="textContent">
														<h3 style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:8px;text-align:left;">
															<span style="color:#EC3B3B">Informasi</span> 
															<span style="color:#2B2B2B">Pengiriman</span>
														</h3>
														<div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:13px;margin-bottom:0;color:#999;line-height:135%;">
															<table cellpadding="3">
																<tbody><tr>
																	<td width="150" style="color:#555">Provisi</td>
																	<td>{{goExplode($transaksi->province,'-',1)}}</td>
																</tr>
																<tr>
																	<td width="150" style="color:#555">
																		Kota
																	</td>
																	<td>{{goExplode($transaksi->city,'-',1)}}</td>
																</tr>
																<tr>
																	<td width="150" style="color:#555">
																		Kecamatan
																	</td>
																	<td>{{goExplode($transaksi->district,'-',1)}}</td>
																</tr>
																<tr>
																	<td width="150" style="color:#555">Alamat</td>
																	<td>{{$transaksi->address}}</td>
																</tr>
																<tr>
																	<td width="150" style="color:#555">Kode Pos</td>
																	<td><strong>{{$transaksi->postalcode}}</strong></td>
																</tr>
																<tr>
																	<td width="150" style="color:#555">Berat Barang</td>
																	<td>{{$transaksi->weight}} Gram</td>
																</tr>
																	@if($transaksi->courier!=null)
																<tr>
																	<td width="150" style="color:#555">Kurir</td>
																	<td>
																	{{strtoupper($transaksi->courier)}}</td>
																	
																</tr>
																@endif
																	@if ($transaksi->courierpacket!=null)
																<tr>
																	<td width="150" style="color:#555">Paket Pengiriman</td>
																	<td>
																	{{goExplode($transaksi->courierpacket,'-','0')}} - Rp {{number_format(goExplode($transaksi->courierpacket,'-',1))}}
																	</td>
																</tr>
																	@endif
															</tbody></table>
														</div>
													</td>
												</tr>
											</tbody></table>
										</td>
									</tr>
								</tbody></table>
								<!-- // CONTENT TABLE -->

							</td>
						</tr>
					</tbody></table>
					<!-- // FLEXIBLE CONTAINER -->
				</td>
			</tr>
		</tbody></table>
		<!-- // CENTERING TABLE -->
	</td>
</tr>
<!-- ENd Info -->

<!-- Info Akun bank -->
<tr mc:hideable="">
	<td align="center" valign="top">
		<!-- CENTERING TABLE // -->
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tbody><tr>
				<td align="center" valign="top">
					<!-- FLEXIBLE CONTAINER // -->
					<table border="0" cellpadding="30" cellspacing="0" width="500" class="flexibleContainer">
						<tbody><tr>
							<td valign="top" width="500" class="flexibleContainerCell">

								<!-- CONTENT TABLE // -->
								<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody><tr>
										<td align="left" valign="top" class="flexibleContainerBox">
											<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;overflow:hidden;">
												<tbody><tr>
													<td align="left" class="textContent">
														<h3 style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:8px;text-align:left;">
															<span style="color:#EC3B3B">Informasi</span> 
															<span style="color:#2B2B2B">Pembayaran</span>
														</h3>
														<div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:13px;margin-bottom:0;color:#A5A5A5;line-height:135%;">
															<article style="margin-bottom:20px;">
															Silahkan Anda segera melakukan transfer sesuai dengan total biaya pemesanan ke Salah Satu Akun Berikut
															</article>
															@foreach($akun as $result)
															<table cellpadding="3" style="width:100%;color:#777;">
																<tbody>
																	<tr>
																		<td>Nama Bank</td>
																		<td>
																			<strong>{{$result->bank}}</strong>
																		</td>
																	</tr>
																	<tr>
																		<td>Nama Akun Bank</td>
																		<td>
																			<strong>{{$result->name}}<strong>
																		</td>
																	</tr>
																	<tr>
																		<td>No Rekening Bank</td>
																		<td><strong>
																				{{$result->number}}
																			</strong>
																		</td>
																	</tr>
																</tbody>
															</table>
															@endforeach
															<div style="margin-top:8px;border-bottom:1px solid#DDD;margin-bottom:8px;"></div>
															<div style="margin-top:20px">
																Setelah Melakukan Pembayaran , Agar Melakukan Konfirmasi Pembayaran pada kami agar transaksi berjalan dengan baik
															</div>
														</div>
													</td>
												</tr>
												
											</tbody></table>
										</td>
									</tr>
								</tbody></table>
								<!-- // CONTENT TABLE -->

							</td>
						</tr>
					</tbody></table>
					<!-- // FLEXIBLE CONTAINER -->
				</td>
			</tr>
		</tbody></table>
		<!-- // CENTERING TABLE -->
	</td>
</tr>
<!-- End Info -->

<!-- Invoice -->
<tr mc:hideable="">
	<td align="center" valign="top">
		<!-- CENTERING TABLE // -->
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tbody><tr>
				<td align="center" valign="top">
					<!-- FLEXIBLE CONTAINER // -->
					<table border="0" cellpadding="30" cellspacing="0" width="500" class="flexibleContainer">
						<tbody><tr>
							<td valign="top" width="500" class="flexibleContainerCell">

								<!-- CONTENT TABLE // -->
								<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
									<tbody><tr>
										<td align="left" valign="top" class="flexibleContainerBox">
											<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;overflow:hidden;">
												<tbody><tr>
													<td align="left" class="textContent">
														<h3 style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:8px;text-align:left;">
															<span style="color:#EC3B3B">Nomor</span> 
															<span style="color:#2B2B2B">Invoice</span>
														</h3>
														<div style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:18px;margin-bottom:0;color:#999;line-height:135%;background:#EEE;padding:10px;text-align:center;border:2px dashed#CCC;">
														{{$transaksi->invoice}}
														</div>
													</td>
												</tr>
												
											</tbody></table>
										</td>
									</tr>
								</tbody></table>
								<!-- // CONTENT TABLE -->

							</td>
						</tr>
					</tbody></table>
					<!-- // FLEXIBLE CONTAINER -->
				</td>
			</tr>
		</tbody></table>
		<!-- // CENTERING TABLE -->
	</td>
</tr>
<!-- END -->

<tr>
	<td align="center" valign="top">
		<!-- CENTERING TABLE // -->
		<table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#F8F8F8">
			<tbody><tr>
				<td align="center" valign="top">
					<!-- FLEXIBLE CONTAINER // -->
					<table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
						<tbody><tr>
							<td align="center" valign="top" width="500" class="flexibleContainerCell">
								<table border="0" cellpadding="30" cellspacing="0" width="100%">
									<tbody><tr>
										<td align="center" valign="top">

											<!-- CONTENT TABLE // -->
											<table border="0" cellpadding="0" cellspacing="0" width="100%">
												<tbody><tr>
													<td valign="top" class="textContent">
														<h3 mc:edit="header" style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;">
															Terima Kasih !
														</h3>
														<div mc:edit="body" style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;">
															Terima Kasih Telah melakukan pemesanan / pembelin produk kami , anda dapat menggunakan no invoice di atas sebagai konfirmasi jika pembayaran telah di lakukan 
														</div>
													</td>
												</tr>
											</tbody></table>
											<!-- // CONTENT TABLE -->

										</td>
									</tr>
								</tbody></table>
							</td>
						</tr>
					</tbody></table>
					<!-- // FLEXIBLE CONTAINER -->
				</td>
			</tr>
		</tbody></table>
		<!-- // CENTERING TABLE -->
	</td>
</tr>


@endsection