@extends('layouts.app')

@section('content') 
	<div class="container"> 
		<div class="row"> 
			<div class="col-md-12"> 
				<ul class="breadcrumb"> 
					<li><a href="{{ url('/home') }}">Dashboard</a></li> 
					<li><a href="{{ url('/admin/rt') }}">Rukun Tetangga</a></li> 
					<li class="active">Edit RT</li> 
				</ul> 

				<div class="panel panel-default"> 
					<div class="panel-heading"> 
						<h2 class="panel-title">Edit RT</h2> 
					</div>

					<div class="panel-body"> 
						{!! Form::model($rt,array('action' => ['RtController@update','id'=>$rt->id])) !!}
						<input type="hidden" name="_method" value="PUT">
						@include('rt._form')
						{!! Form::close() !!}
					</div> 
				</div> 
			</div> 
		</div> 
	</div> 
@endsection


