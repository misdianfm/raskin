@extends('layouts.dashboard')

@section('page_heading')
<ul class="breadcrumb"> 
	<li><a href="{{ url('/home') }}">Beranda</a></li> 
	<li class="active">Perhitungan SPK</li> 
</ul>
@endsection

@section('section')
<div class="panel panel-success">
	<div class="panel-heading">
		<h2 class="panel-title" style="text-align: center;"><b>KRITERIA</b></h2>
	</div>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Kriteria</th>
				<th>Tipe Keuntungan</th>
				<th>Bobot Awal</th>
				<th>Bobot Baru</th>
				{{-- <th>Aksi</th> --}}
			</tr>
		</thead>
		<tbody>
			@foreach($kriteria as $no => $krit)
			<tr id="{{ $krit->id }}">
				<td style="width: 5%">{{ $no + 1 }}</td>
				<td name="kriteria"><span class="hide">{{ $krit->kriteria }}</span>{{ $krit->kriteria }}</td>
				<td>{{ $krit->tipe }}</td>
				<td name="bobotawal"><span class="hide">{{ $krit->bobot }}</span>{{ $krit->bobot }}</td>
				<td name="bobotbaru"><span class="hide">{{ $krit->wj }}</span>{{ $krit->wj }}</td>
				{{-- <td width="12%">
					<button class="btn btn-success btn-xs" type="button" name="lihat1">
						<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> lihat perhitungan
					</button>
				</td> --}}
			</tr>
			@endforeach
			<tr>
				<td colspan="6">Jumlah Bobot Awal = {{ $jum1 }}</td>
			</tr>
			<tr>
				<td colspan="6">Jumlah Bobot Baru = {{ $jumz1 }}</td>
			</tr>
		</tbody>
	</table>
	{{ $kriteria->appends(['kriteria' => $kriteria->currentPage()])->links() }}
</div>

<br>

<div class="panel panel-success">
	<div class="panel-heading">
		<h2 class="panel-title" style="text-align: center;"><b>VEKTOR S DAN VEKTOR V</b></h2>
	</div>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nomor KK</th>
				<th>Kepala Keluarga</th>
				<th>Alamat</th>
				<th>Vektor S</th>
				<th>Vektor V</th>
				{{-- <td>Aksi</td> --}}
			</tr>
		</thead>
		<tbody>
			@foreach($keluarga as $no => $kel)
			<tr id="{{ $kel->id_kk }}">
				<td style="width: 5%">{{ $no + 1 }}</td>
				<td name="kk"><span class="hide">{{ $kel->no_kk }}</span>{{ $kel->no_kk }}</td>
				<td>{{ $kel->nama }}</td>
				<td>{{ $kel->alamat }}</td>
				<td>{{ $kel->vektor_s }}</td>
				<td>{{ $kel->vektor_v }}</td>
				{{-- <td width="12%">
					<button class="btn btn-success btn-xs" type="button" name="lihat2">
						<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> lihat perhitungan
					</button>
				</td> --}}
			</tr>
			
			@endforeach
			<tr>
				<td colspan="7"><b>Jumlah Vektor S => {{ $jum }}</b></td>
			</tr>
			<tr>
				<td colspan="7"><b>Jumlah Vektor V => {{ $jumz }}</b></td>
			</tr>
		</tbody>
	</table>
	{{ $keluarga->appends(['keluarga' => $keluarga->currentPage()])->links() }}
</div>			
@endsection

@section('modal')
	<!-- LIHAT PERHITUNGAN KRITERIA -->
    <div id="lihat1" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
            	@foreach($kriteria as $krit)
            	<form class="form-horizontal" role="form" method="POST" action="{{ action('KriteriaController@show', $krit->id) }}">
            	@endforeach
            		<input type="hidden" name="_method" value="put">
                    <input type="hidden" name="id" value="">

                    <div class="modal-header">
                        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title"><b name="kriteria"></b></h4>
                    </div>
					<div class="modal-body">
						<center>
							<h3>
							Rumus = 
							<math>
								<mrow>
									<mfrac linethickness="1">
										<mrow>
											<mrow>
												<msub>
													<mrow>
														<mi>W</mi>
													</mrow>
													<mrow>
														<mi>j</mi>
													</mrow>
												</msub>
											</mrow>
										</mrow>
										<mrow>
											<mrow>
												<mo>&#8721;</mo>
												<msub>
													<mrow>
														<mi>W</mi>
													</mrow>
													<mrow>
														<mi>j</mi>
													</mrow>
												</msub>
											</mrow>
										</mrow>
									</mfrac>
								</mrow>
							</math>
							</h3>
						</center>

						<br>
						<p>
							<b>Keterangan:</b><br>
							<math>
								<mrow>
									<mi>W</mi>
								</mrow>
								<mrow>
									<mi>j</mi>
								</mrow>
							</math> = Bobot awal<br>
							<math>
								<mo>&#8721;</mo>
								<msub>
									<mrow>
										<mi>W</mi>
									</mrow>
									<mrow>
										<mi>j</mi>
									</mrow>
								</msub>
							</math> = Jumlah semua bobot awal
						</p>
						<hr>
						<p>
							<b>Diketahui:</b> <br>
							<math>
								<mrow>
									<mi>W</mi>
								</mrow>
								<mrow>
									<mi>j</mi>
								</mrow>
							</math> = <b name="bobotawal"></b><br>
					   		<math>
								<mo>&#8721;</mo>
								<msub>
									<mrow>
										<mi>W</mi>
									</mrow>
									<mrow>
										<mi>j</mi>
									</mrow>
								</msub>
							</math> = <b>{{ $jum1 }}</b>
						</p>
						<p>
							<h3><center>
								Bobot baru = 
						    	<math>
							    	<mrow>
							    		<mfrac linethickness="1">
							    			<mrow>
							    				<mrow>
							    					<mn><b name="bobotawal"></b></mn>
							    				</mrow>
							    			</mrow>
							    			<mrow>
							    				<mrow>
							    					<mn><b>{{ $jum1 }}</b></mn>
							    				</mrow>
							    			</mrow>
							    		</mfrac>
							    	</mrow>
							    </math> = <b name="bobotbaru"></b>
							</center></h3>
						</p>
					</div>

					<div class="modal-footer">
                        <button type="button" class="btn btn-primary" name="batal">Tutup</button>
                    </div>
				</form>
            </div>
        </div>
    </div>

    <!-- LIHAT PERHITUNGAN VEKTOR V DAN S -->
    <div id="lihat2" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
            	<div class="modal-header">
                        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Perhitungan - KK. <b name="kk"></b></h4>
                    </div>
					<div class="modal-body">
					    <table>
					    	<tbody>
					    		<tr>
					    			<td colspan="2" align="center">
					    				<b>PERHITUNGAN VEKTOR S</b>
					    				<br><hr>
					    			</td>
					    		</tr>
					    		<tr>
					    			<td width="40%" align="center">
					    				<h3 style="text-align: center;">
									    	S = 
									    	<math>
									    		<mrow>
									    			<msubsup><mrow><mo>&#8719;</mo></mrow><mrow><mrow><mi>j</mi><mo>=</mo><mn>1</mn></mrow></mrow><mrow><mrow><mi>n</mi></mrow></mrow></msubsup>
										    		<msubsup>
										    			<mrow><mi>X</mi></mrow><mrow><mi>ij</mi></mrow>
										    			<mrow><mrow><msub><mrow><mi>W</mi></mrow><mrow><mi>j</mi></mrow></msub></mrow></mrow>
										    		</msubsup>
									    		</mrow>
									    	</math>
									    </h3>
					    			</td>
					    			<td>
					    				<b>Keterangan:</b><br>
					    				<math>
											<mrow>
												<mi>X</mi>
											</mrow>
											<mrow>
												<mi>ij</mi>
											</mrow>
										</math>
								    	= bobot setiap kriteria yang dipilih<br>
								    	<math>
											<mrow>
												<mi>W</mi>
											</mrow>
											<mrow>
												<mi>j</mi>
											</mrow>
										</math>
								    	= bobot baru kriteria
					    			</td>
					    		</tr>
					    		<tr>
					    			<td colspan="2">
					    			<br><br>
					    				S = <b name="id_kk"></b>
					    				<?php $x = 1;?>
					    				{{$x}}
					    				@foreach($variabel as $vari)
					    					@if($vari->kk_id == $x)
					    					(<math>
												<msup>
													<mrow><mi>{{$vari->variabel->bobot}}</mi></mrow>
													<mrow>
														<mrow><mi>
															@if($vari->variabel->kriteria->tipe == "Keuntungan")
																({{$vari->variabel->kriteria->wj}})
															@else
																-({{$vari->variabel->kriteria->wj}})
															@endif
														</mi></mrow>
													</mrow>
												</msup>
											</math>)
											@endif
										@endforeach
					    			</td>
					    		</tr>
					    		<tr>
					    			<td colspan="2" align="center">
					    			<br>
					    				<h4>Vektor S = {{$kel->vektor_v}}</h4>
					    			</td>
					    		</tr>
					    		<tr>
					    			<td colspan="2"  align="center">
					    				<hr>
					    				<b>PERHITUNGAN VEKTOR V</b>
					    				<br><hr>
					    			</td>
					    		</tr>
					    		<tr>
					    			<td width="35%">
					    				<center>
											<h3>
											V = 
											<math>
												<mrow><mfrac linethickness="1">
													<mrow><mrow>
														<msub>
															<mrow><mi>S</mi></mrow>
															<mrow><mi>j</mi></mrow>
														</msub>
													</mrow></mrow>
													<mrow><mrow>
														<mo>&#8721;</mo>
														<msub>
															<mrow><mi>S</mi></mrow>
															<mrow><mi>j</mi></mrow>
														</msub>
												</mrow></mrow></mfrac></mrow>
											</math>
											</h3>
										</center>
					    			</td>
					    			<td >
					    				<b>Keterangan:</b><br>
					    				<math>
											<mrow>
												<mi>S</mi>
											</mrow>
											<mrow>
												<mi>j</mi>
											</mrow>
										</math>
								    	= vektor S pada kriteria yang dipilih<br>
								    	<math>
											<mo>&#8721;</mo>
											<msub>
												<mrow><mi>S</mi></mrow>
												<mrow><mi>j</mi></mrow>
											</msub>
										</math>
								    	= jumlah semua vektor S
					    			</td>
					    		</tr>
					    		<tr>
					    			<td width="20%" align="center">
					    			<br>
					    				<math>
											<mrow>
												<mi>S</mi>
											</mrow>
											<mrow>
												<mi>j</mi>
											</mrow>
										</math>
								    	= {{$kel->vektor_s}}<br>
								    	<math>
											<mo>&#8721;</mo>
											<msub>
												<mrow><mi>S</mi></mrow>
												<mrow><mi>j</mi></mrow>
											</msub>
										</math>
								    	= {{$jum}}
					    			</td>
					    			<td style="float: left;">
					    			<br>
						    			<h4>V = 
									    <math>
										   	<mrow>
										   		<mfrac linethickness="1">
										   			<mrow>
										   				<mrow>
										   					<mn>{{$kel->vektor_s}}</mn>
										   				</mrow>
										   			</mrow>
										   			<mrow>
										   				<mrow>
										   					<mn><b>{{ $jum1 }}</b></mn>
										   				</mrow>
										   			</mrow>
										   		</mfrac>
										   	</mrow>
										</math><br>
										Vektor V = {{$jum}}</h4>
					    			</td>
					    		</tr>
					    		<tr>
					    			<td>
					    				COBA = $var id;
					    			</td>
					    		</tr>
					    	</tbody>
					    </table>
					</div>

					<div class="modal-footer">
                        <button type="button" class="btn btn-primary" name="batal">Tutup</button>
                    </div>
				
            </div>
        </div>
    </div>
@endsection

@section('script')
	<script type="text/javascript">
		$(document)

        // HITUNG KRITERIA
        .on('click', 'button[name="lihat1"]', function() {
        	var id = $(this).parents('tr').first().attr('id');
        	var variabel = $(this).parents('tr').first().find('td[name="kriteria"]').find('span').text();
        	var bobotbaru = $(this).parents('tr').first().find('td[name="bobotbaru"]').find('span').text();
        	var bobotawal = $(this).parents('tr').first().find('td[name="bobotawal"]').find('span').text();
            $('#lihat1 b[name="kriteria"]').text(variabel);
            $('#lihat1 b[name="bobotbaru"]').text(bobotbaru);
            $('#lihat1 b[name="bobotawal"]').text(bobotawal);
        	$('#lihat1').removeClass('fade');
            $('#lihat1').show();
        })

        // HITUNG VEKTOR S V
        .on('click', 'button[name="lihat2"]', function() {
        	var id = $(this).parents('tr').first().attr('id');
        	var kk = $(this).parents('tr').first().find('td[name="kk"]').find('span').text();
        	var bobotbaru = $(this).parents('tr').first().find('td[name="bobotbaru"]').find('span').text();
        	var bobotawal = $(this).parents('tr').first().find('td[name="bobotawal"]').find('span').text();
            $('#lihat2 .id').text(id);
            $('#lihat2 b[name="kk"]').text(kk);
            $('#lihat2 b[name="bobotbaru"]').text(bobotbaru);
            $('#lihat2 b[name="bobotawal"]').text(bobotawal);
        	$('#lihat2').removeClass('fade');
            $('#lihat2').show();
        })

        .on('click', 'button[name="batal"], .close-modal', function() {
            $('.modal').hide();
        })
        ;
	</script>
@endsection



