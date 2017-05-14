@extends('layouts.app')

@section('content') 
	<div class="container"> 
		<div class="row"> 
			<div class="col-md-12"> 
				<ul class="breadcrumb"> 
					<li><a href="{{ url('/home') }}">Dashboard</a></li> 
					<li><a href="{{ url('/admin/variabel') }}">Variabel</a></li> 
					<li class="active">Edit Variabel</li> 
				</ul> 

				<div class="panel panel-default"> 
					<div class="panel-heading"> 
						<h2 class="panel-title">Edit Variabel</h2> 
					</div>

					<div class="panel-body"> 
						{!! Form::model($variab,array('action' => ['VariabelController@update','id'=>$variab->id])) !!}
						<input type="hidden" name="_method" value="PUT">
						@include('variabel._form')
						{!! Form::close() !!}
					</div> 
				</div> 
			</div> 
		</div> 
	</div> 
@endsection

