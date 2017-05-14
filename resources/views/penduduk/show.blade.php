@extends('layouts.dashboard')

@section('page_heading')
<ul class="breadcrumb"> 
	<li><a href="{{ url('/home') }}">Beranda</a></li> 
	<li><a href="{{ url('/penduduk') }}">Penduduk</a></li> 
	<li class="active">Lihat Data Penduduk ({{ $pend->nama }})</li> 
</ul>
@endsection

@section('section') 
	<div class="col-lg-12"> 
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
			<div class="panel-heading">
				<div class="panel-title" style="font-size: 18px;">
					DATA PENDUDUK - {{ $pend->nama }}
				</div>
			</div>
			<div class="panel-body">
				@if(Auth::user()->level != "Kepaladesa")
				<div class="btn-group" style="float: right;">
					<a href="#" class="btn btn-primary" data-toggle="dropdown">
					  	<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Aksi/Tindakan</a>
					<a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
					<ul class="dropdown-menu">
					    <li><a href="{{ route('penduduk.create') }}">Tambah Penduduk</a></li>
					    <li class="divider"></li>
					    <li><a href="{{ action('PendudukController@edit',['id'=>$pend->id_penduduk]) }}">Ubah Data Penduduk</a></li>
					</ul>
				</div>

				<br><hr>
				@endif

				<div class="col-md-4">
					<ul class="list-group">
				       	<li class="list-group-item">
				       		<p>
				       			<b>NIK</b> <br> {{$pend->nik}}
				       		</p>
				       	</li>
				       	<li class="list-group-item">
					   		<p>
					   			<b>Nama Lengkap</b> <br> {{ $pend->nama }}
					   		</p>
					   	</li>
					   	<li class="list-group-item">
					   		<p>
					   			<b>Jenis Kelamin</b> <br> {{ $pend->jk->jk }}
					   		</p>
					   	</li>
					   	<li class="list-group-item">
					   		<p>
					   			<b>Tempat, Tanggal Lahir</b> <br> {{ $pend->tl->tl }}, {{ $pend->tlahir }}
					   		</p>
					   	</li>
					   	<li class="list-group-item">
					   		<p>
					   			<b>Golongan Darah</b> <br> {{$pend->goldar->goldar}}
					   		</p>
					   	</li>
					   	<li class="list-group-item">
					   		<p>
					   			<b>Agama</b> <br> {{ $pend->agama->agama }}
					   		</p>
					   	</li>
					   	<li class="list-group-item">
					   		<p>
					   			<b>Pendidikan Terakhir</b> <br> {{ $pend->pendidikan->pendidikan }}
					   		</p>
					   	</li>
					   	<li class="list-group-item">
					   		<p>
					   			<b>Pekerjaan</b> <br> {{$pend->pekerjaan->pekerjaan}}
					   		</p>
					   	</li>
				   </ul>
				</div>

				<div class="col-md-4">
					<ul class="list-group">
				       	<li class="list-group-item">
				       		<p>
				       			<b>Status Kawin</b> <br> {{ $pend->status_kawin }}		 
				       		</p>
				       	</li>
				       	<li class="list-group-item">
					   		<p>
					   			<b>Akta Lahir</b> <br> 
					   			<?php if ($pend->akta_lahir==NULL) {
					  				echo "Tidak Ada";
					  			}else{?>
					  				{{ $pend->akta_lahir }}
					  			<?php } ?>
					   		</p>
					   	</li>
					   	<li class="list-group-item">
					   		<p>
					   			<b>Nomor Akta Lahir</b> <br> 
					   			<?php if ($pend->akta_lahir_no==NULL) {
					  				echo "Tidak Ada";
					  			}else{?>
					  				{{ $pend->akta_lahir_no }} 
					  			<?php } ?>
					   		</p>
					   	</li>
					   	<li class="list-group-item">
					   		<p>
					   			<b>Akta Kawin</b> <br> 
					   			<?php if ($pend->akta_kawin==NULL) {
					  				echo "Tidak Ada";
					  			}else{?>
					  				{{ $pend->akta_kawin }} 
					  			<?php } ?>
					   		</p>
					   	</li>
					   	<li class="list-group-item">
					   		<p>
					   			<b>Nomor Akta Kawin</b> <br> 
					   			<?php if ($pend->akta_kawin_no==NULL) {
					  				echo "Tidak Ada";
					  			}else{?>
					  				{{ $pend->akta_kawin_no }} 
					  			<?php } ?>
					   		</p>
					   	</li>
					   	<li class="list-group-item">
					   		<p>
					   			<b>Akta Cerai</b> <br> 
					   			<?php if ($pend->akta_cerai==NULL) {
					  				echo "Tidak Ada";
					  			}else{?>
					  				{{ $pend->akta_cerai }} 
					  			<?php } ?>
					   		</p>
					   	</li>
					   	<li class="list-group-item">
					   		<p>
					   			<b>Nomor Akta Cerai</b> <br> 
					   			<?php if ($pend->akta_cerai_no==NULL) {
					  				echo "Tidak Ada";
					  			}else{?>
					  				{{ $pend->akta_cerai_no }} 
					  			<?php } ?>
					   		</p>
					   	</li>
				   </ul>
				</div>

				<div class="col-md-4">
					<b>DATA KELUARGA</b>
					<ul class="list-group">
				       	<li class="list-group-item">
				       		<p>
				       			<b>Nomor KK</b> <br> <a style="color: rgb(51, 122, 183);" href="{{ action('KeluargaController@show',['id'=>$pend->kk_id]) }}">{{$pend->kk->no_kk}}</a> 
				       		</p>
				       	</li>
				       	<li class="list-group-item">
					   		<p>
					   			<b>Alamat</b> <br> RT {{ $pend->kk->rt->rt}}/RW {{ $pend->kk->rw->rw}}, {{ $pend->kk->alamat }}
					   		</p>
					   	</li>
					   	<li class="list-group-item">
					   		<p>
					   			<b>Status Hubungan Dalam Keluarga</b> <br> {{ $pend->shdk->shdk }}
					   		</p>
					   	</li>
					   	<li class="list-group-item">
					   		<p>
					   			<b>Nama Ayah</b> <br> {{$pend->nama_ayah}}
					   		</p>
					   	</li>
					   	<li class="list-group-item">
					   		<p>
					   			<b>Nama Ibu</b> <br> {{$pend->nama_ibu}}
					   		</p>
					   	</li>
				   </ul>
				</div>

			</div>
		</div>
	</div>
@endsection



