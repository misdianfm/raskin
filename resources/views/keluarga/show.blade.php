@extends('layouts.dashboard')

@section('page_heading')
<ul class="breadcrumb"> 
	<li><a href="{{ url('/home') }}">Beranda</a></li> 
	<li><a href="{{ url('/keluarga') }}">Keluarga</a></li> 
	<li class="active">Lihat Data Keluarga ({{ $kel->no_kk }})</li> 
</ul>
@endsection

@section('section') 
	<div class="col-lg-12" style="padding: 10px">
		@if (session('sukses'))
			<div class="alert alert-success" role="alert">
				   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				       <span aria-hidden="true">&times;</span>
				   </button>
				   <strong>Selamat!</strong> {{ session('sukses') }}
			</div>
		@endif
	</div>

	<div class="col-lg-12">
		<div class="panel panel-success">
		    <div class="panel-heading" style="text-align: center;">
		    	<div class="panel-title">
		    		<b>DATA KELUARGA - NO.KK {{ $kel->no_kk }}</b>
		    	</div>
		    </div>
			<div class="panel-body">
				@if(Auth::user()->level != "Kepaladesa")
				<div class="col-md-12">
					<div class="btn-group" style="float: right;">
					  <a href="#" class="btn btn-primary" data-toggle="dropdown">
					  	<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Aksi/Tindakan
					  </a>
					  <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
					  <ul class="dropdown-menu">
					    <li><a href="{{ action('KeluargaController@penduduk',['id'=>$kel->id_kk]) }}">Tambah Anggota Keluarga</a></li>
					    <li class="divider"></li>

					    <li><a href="{{ action('KeluargaController@edit',['id'=>$kel->id_kk]) }}">Ubah Data Keluarga</a></li>
					  </ul>
					</div>
				</div>
				<br><hr>
				@endif
				
				<div class="col-md-12">
					<b><h3>Data Keluarga</h3></b>
					<ul class="list-group col-md-4">
			        	<li class="list-group-item">
			        		<p>
			        			<b>NOMOR KK</b><br>
			        			{{ $kel->no_kk }}
			        		</p>
			        	</li>
			        	<li class="list-group-item">
			        		<p>
			        			<b>ALAMAT</b><br>
			        			{{ $kel->alamat }}, RT {{ $kel->rt->rt }}/RW {{ $kel->rw->rw }}
			        		</p>
			        	</li>
			        </ul>
				</div>
				<br><hr>
				<div class="col-md-12">
					<b><h3>Data Anggota Keluarga</h3></b>
				</div>
				@foreach($pend as $row)
					<div class="col-md-4">
						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title">
						    	<a style="" href="{{ action('PendudukController@show',['id'=>$row->id_penduduk]) }}">
							  		{{ $row->shdk }}
							  	</a>
							  	<div class="btn-group" style="float: right;">
								  <a href="#" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown">
								  	<i class="fa fa-cog" aria-hidden="true"></i>
								  </a>
								  <ul class="dropdown-menu">
								    <li>
								    	<a href="{{ action('PendudukController@show',['id'=>$row->id_penduduk]) }}">Lihat Detail</a>
								    </li>
								    @if(Auth::user()->level != "Kepaladesa")
									    <li>
									    	<a href="{{ action('PendudukController@edit',['id'=>$row->id_penduduk]) }}">Ubah Data</a>
									    </li>
								    @endif
								    @if($row->shdk != "Kepala Keluarga")
								    <li class="divider"></li>
								    <li>
										<form action="{{ action('PendudukController@destroy',['id'=>$row->id_penduduk]) }}" onsubmit="return confirmDelete()" style="display: inline" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}
												<button class="btn btn-default" type="submit" style="border: 0;">
													<center>Hapus Data</center>
												</button>
										</form>
									</li>
								    @endif
								  </ul>
								</div>
						    </h3>
						  </div>
						  
						  	<ul class="list-group">
			                	<li class="list-group-item">
			                		<div><b>Nomor Induk Kependudukan</b></div>
			                		<div>
			                			{{ $row->nik }}
			                		</div>
			                	</li>
			                	<li class="list-group-item">
			                		<div><b>Nama Lengkap</b></div>
			                		<div>
			                			{{ $row->nama }}
			                		</div>
			                	</li>
			                	<li class="list-group-item">
			                		<div><b>Tempat, Tanggal Lahir</b></div>
			                		<div>
			                			<?php
						  					$row->tlahir = date('d M Y', strtotime($row->tlahir));
						  				?>
			                			{{ $row->tl }}, {{ $row->tlahir }}
			                		</div>
			                	</li>
			                </ul>
			                	
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>	
			
		
@endsection

@section('script')
    <script type="text/javascript">
    	function confirmDelete() {
		var result = confirm('Apakah Anda yakin akan menghapus data ini?');

		if (result) {
		        return true;
		    } else {
		        return false;
		    }
		}
    </script>
@endsection


