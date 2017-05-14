@extends('layouts.app')

@section('content') 
	<div class="container"> 
		<div class="row"> 
			<div class="col-md-12"> 
				<ul class="breadcrumb"> 
					<li><a href="{{ url('/home') }}">Dashboard</a></li> 
					<li><a href="{{ url('/admin/bobot') }}">Bobot</a></li> 
					<li class="active">Tambah Bobot</li> 
				</ul> 

				<div class="panel panel-default"> 
					<div class="panel-heading"> 
						<h2 class="panel-title">Tambah Bobot</h2> 
					</div>

					<div class="panel-body"> 
						{!! Form::model($bob,array('action' => ['BobotController@update','id'=>$bob->id])) !!}
						<input type="hidden" name="_method" value="PUT">
						@include('bobot._form')
						{!! Form::close() !!}
					</div>  
				</div> 
			</div> 
		</div> 
	</div> 
@endsection

