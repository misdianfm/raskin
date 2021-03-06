@extends('layouts.dashboard')

@section('page_heading')
	<ul class="breadcrumb"> 
		<li><a href="{{ url('/home') }}">Beranda</a></li> 
		<li><a href="{{ url('/penduduk') }}">Penduduk</a></li> 
		<li class="active">Ubah Data Penduduk</li> 
	</ul>
@endsection

@section('section')
	<div class="col-lg-12">
		<div class="panel panel-success">
	        <div class="panel-heading" style="text-align: center;"><b>Tambah Data Penduduk</b></div>
	            <div class="panel-body">
					{!! Form::model($penduduk,array('action' => ['PendudukController@update','id'=>$penduduk->id_penduduk], 'role'=>'form', 'class'=>'form-horizontal')) !!}
						<input type="hidden" name="_method" value="PUT">
						@include('penduduk._formedit')
					{!! Form::close() !!}
				</div>
			</div> 
		</div> 
	</div> 
@endsection


