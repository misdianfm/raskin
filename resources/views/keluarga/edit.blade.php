@extends('layouts.dashboard')

@section('page_heading')
	<ul class="breadcrumb"> 
		<li><a href="{{ url('/home') }}">Beranda</a></li> 
		<li><a href="{{ url('/keluarga') }}">Keluarga</a></li> 
		<li class="active">Ubah Keluarga - {{$kel->no_kk}}</li> 
	</ul>
@endsection

@section('section')
	<div class="col-lg-6">
		<div class="panel panel-success">
		    <div class="panel-heading" style="text-align: center;">
		    	<b>Ubah Data Keluarga</b>
		    </div>
		    <div class="panel-body"> 
		    	{!! Form::model($kel,array('action' => ['KeluargaController@update','id'=>$kel->id_kk], 'role'=>'form', 'class'=>'form-horizontal')) !!}
					<input type="hidden" name="_method" value="PUT">
					@include('keluarga._form')
				{!! Form::close() !!}
			</div>
		</div>
	</div> 
@endsection

