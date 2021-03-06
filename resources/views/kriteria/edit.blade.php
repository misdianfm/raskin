@extends('layouts.app')

@section('content') 
	<div class="container"> 
		<div class="row"> 
			<div class="col-md-12"> 
				<ul class="breadcrumb"> 
					<li><a href="{{ url('/home') }}">Dashboard</a></li> 
					<li><a href="{{ url('/admin/kriteria') }}">Kriteria</a></li> 
					<li class="active">Tambah Kriteria</li> 
				</ul> 

				<div class="panel panel-default"> 
					<div class="panel-heading"> 
						<h2 class="panel-title">Tambah Kriteria</h2> 
					</div>

					<div class="panel-body"> 
						{!! Form::model($krit,array('action' => ['KriteriaController@update','id'=>$krit->id])) !!}
						<input type="hidden" name="_method" value="PUT">
						@include('kriteria._form')
						{!! Form::close() !!}
					</div> 
				</div> 
			</div> 
		</div> 
	</div> 
@endsection


