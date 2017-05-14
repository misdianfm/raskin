@extends('layouts.dashboard')

@section('page_heading')
<ul class="breadcrumb"> 
	<li><a href="{{ url('/home') }}">Beranda</a></li>
	<li><a href="{{ url('/seleksi') }}">Seleksi</a></li> 
    <li class="active">Lihat Detail Seleksi</li> 
</ul>
@endsection

@section('section') 
	<div class="panel panel-success">
		<div class="panel-heading">
			<h1 class="panel-title" style="text-align: center;">
				<b>Detail Seleksi Raskin - {{ $keluarga->no_kk }}</b>
			</h1>
		</div>
		<div class="panel-body">
			@if(Auth::user()->level != "Kepaladesa")
				<div class="col-md-12">
					<div class="btn-group" style="float: right;">
						<a href="" class="btn btn-primary">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Aksi/Tindakan</a>
						<a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>
								<a href="{{ route('spk.create') }}">Tambah Seleksi</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="{{ action('SpkController@edit',['id'=>$keluarga->id_kk]) }}">Ubah Data Seleksi</a>
							</li>
						</ul>
					</div>
				</div>
				<br><hr>
			@endif

			@foreach($spk as $no => $sp)
				<div class="col-md-6">
					<div class="panel panel-default" style="min-height: 100px;">
					  	<div class="panel-heading">
					    	<h3 class="panel-title">
					    		C{{ $no + 1 }}. {{ $sp->variabel->kriteria->kriteria}}
					    	</h3>
					  	</div>
					  	<div class="panel-body">
					    	<b>{{ $sp->variabel->variabel}} (Bobot: {{ $sp->variabel->bobot}})</b>
					  	</div>
					</div>
					
				</div>
			@endforeach
		</div>
	</div>
	
	

	
@endsection



