@extends('layouts.dashboard')

@section('page_heading')
	<ul class="breadcrumb"> 
		<li><a href="{{ url('/home') }}">Beranda</a></li> 
		<li><a href="{{ url('/keluarga') }}">Keluarga</a></li> 
		<li class="active">Tambah Penduduk</li> 
	</ul>
@endsection

@section('section')
	<div class="col-md-12">
		<div class="panel panel-success">
	        <div class="panel-heading" style="text-align: center;"><b>TAMBAH DATA PENDUDUK - NO.KK {{ $kel->no_kk }}</b></div>
	           <div class="panel-body">
					{!! Form::model($penduduk,array('action' => 'KeluargaController@pendudukstore', 'role'=>'form', 'class'=>'form-horizontal')) !!}
					@include('keluarga._penduduk')
					{!! Form::close() !!}
				</div>
			</div> 
		</div> 
	</div> 
@endsection

