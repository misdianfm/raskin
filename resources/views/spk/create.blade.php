@extends('layouts.dashboard')

@section('page_heading')
	<ul class="breadcrumb"> 
		<li><a href="{{ url('/home') }}">Beranda</a></li>
	<li><a href="{{ url('/seleksi') }}">Seleksi</a></li> 
    <li class="active">Tambah Seleksi</li> 
	</ul>
@endsection

@section('section')
	<div class="col-md-7">
		<div class="panel panel-success">
            <div class="panel-heading">
                <h2 class="panel-title" style="text-align: center;"><b>Tambah Seleksi</b></h2>
            </div>
            <div class="panel-body">
            	<div> 
					{!! Form::model($spk,array('action' => 'SpkController@store')) !!}
					@include('spk._form')
					{!! Form::close() !!}
				</div>
            </div>
        </div>
	</div> 
@endsection

