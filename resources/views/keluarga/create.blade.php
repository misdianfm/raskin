@extends('layouts.dashboard')

@section('page_heading')
	<ul class="breadcrumb"> 
		<li><a href="{{ url('/home') }}">Beranda</a></li> 
		<li><a href="{{ url('/keluarga') }}">Keluarga</a></li> 
		<li class="active">Tambah Keluarga</li> 
	</ul>
@endsection

@section('section') 
	<div class="panel panel-success">
	    <div class="panel-heading" style="text-align: center;">
	    	<b>Tambah Data Keluarga</b>
	    </div>
		<div class="panel-body"> 
			{!! Form::model($kel,array('action' => 'KeluargaController@store', 'role'=>'form', 'class'=>'form-horizontal')) !!}
			@include('keluarga._formcreate')
			{!! Form::close() !!}
		</div>
	</div>
@endsection

