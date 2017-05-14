@extends('layouts.dashboard')

@section('page_heading')
	<ul class="breadcrumb"> 
		<li><a href="{{ url('/home') }}">Dashboard</a></li> 
		<li><a href="{{ url('/user') }}">Kelola Pengguna</a></li> 
		<li class="active">Ubah Pengguna - {{$pengguna->name}}</li> 
	</ul>
@endsection

@section('section')
    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading" style="text-align: center;">
                <b>UBAH DATA PENGGUNA - {{$pengguna->name}}</b>
            </div>
            <div class="panel-body">
                {!! Form::model($pengguna,array('action' => ['UserController@update','id'=>$pengguna->id], 'role'=>'form', 'class'=>'form-horizontal')) !!}
                <input type="hidden" name="_method" value="PUT">

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> 
                        {!! Form::label('name', 'Nama', ['class'=>'col-md-3 control-label']) !!} 
                        <div class="col-md-7"> 
                            {!! Form::text('name', null, ['class'=>'form-control']) !!} 
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div> 
                    </div>

                    @if($pengguna->level == "Superadmin")
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}"> 
                            {!! Form::label('username', 'Username', ['class'=>'col-md-3 control-label']) !!} 
                            <div class="col-md-7"> 
                                {!! Form::text('username', null, ['class'=>'form-control','readonly']) !!} 
                                {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                            </div> 
                        </div>
                    @else
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}"> 
                            {!! Form::label('username', 'Username', ['class'=>'col-md-3 control-label']) !!} 
                            <div class="col-md-7"> 
                                {!! Form::text('username', null, ['class'=>'form-control']) !!} 
                                {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                            </div> 
                        </div>
                    @endif

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"> 
                        {!! Form::label('email', 'Alamat Email', ['class'=>'col-md-3 control-label']) !!}
                        <div class="col-md-7"> 
                            {!! Form::email('email', null, ['class'=>'form-control']) !!} 
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div> 
                    </div>

                    @if($pengguna->level != "Superadmin")
                        <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                            {!! Form::label('level', 'Level Pengguna', ['class'=>'col-md-3 control-label']) !!} 
                            <div class="col-md-7">
                                {{ Form::select('level', [
                                   'Admin' => 'Admin',
                                   'Kepaladesa' => 'Kepala Desa',
                                ], null, ['class' => 'form-control', 'placeholder' => '--Level Pengguna--']) }}
                                
                                {!! $errors->first('level', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    @endif

                    <div class="form-group"> 
                        <div class="col-md-7 col-md-offset-3"> 
                            <button type="submit" class="btn btn-primary"> 
                                <i class="fa fa-btn fa-user"></i> Ubah 
                            </button> 
                        </div> 
                    </div> 

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection


