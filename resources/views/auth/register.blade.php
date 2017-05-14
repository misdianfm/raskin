@extends('layouts.dashboard')

@section('page_heading')
<ul class="breadcrumb">
    <li><a href="{{ url('/user') }}">Kelola Pengguna</a></li>  
    <li class="active">Tambah Pengguna</li> 
</ul>
@endsection

@section('section')
    <div class="col-md-8">
        <div class="panel panel-success">
            <div class="panel-heading" style="text-align: center;">
                <b>TAMBAH PENGGUNA</b>
            </div>
            <div class="panel-body">  
                {!! Form::open(['url'=>'/register', 'class'=>'form-horizontal']) !!}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> 
                        {!! Form::label('name', 'Nama', ['class'=>'col-md-4 control-label']) !!} 
                        <div class="col-md-6"> 
                            {!! Form::text('name', null, ['class'=>'form-control']) !!} 
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!} 
                        </div> 
                    </div>

                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}"> 
                        {!! Form::label('username', 'Username', ['class'=>'col-md-4 control-label']) !!} 
                        <div class="col-md-6"> 
                            {!! Form::text('username', null, ['class'=>'form-control']) !!} 
                            {!! $errors->first('username', '<p class="help-block">:message</p>') !!} 
                        </div> 
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"> 
                        {!! Form::label('email', 'Alamat Email', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6"> 
                            {!! Form::email('email', null, ['class'=>'form-control']) !!} 
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!} 
                        </div> 
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"> 
                        {!! Form::label('password', 'Password', ['class'=>'col-md-4 control-label']) !!} 
                        <div class="col-md-6"> 
                            {!! Form::password('password', ['class'=>'form-control']) !!} 
                            {!! $errors->first('password', '<p class="help-block">:message</p>') !!} 
                        </div> 
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        {!! Form::label('password_confirmation', 'Konfirmasi Password', ['class'=>'col-md-4 control-label']) !!} 
                        <div class="col-md-6"> 
                            {!! Form::password('password_confirmation', ['class'=>'form-control']) !!} 
                            {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!} 
                        </div> 
                    </div>

                    <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                        {!! Form::label('level', 'Level Pengguna', ['class'=>'col-md-4 control-label']) !!} 
                        <div class="col-md-6">
                            {{ Form::select('level', [
                               'Admin' => 'Admin',
                               'Kepaladesa' => 'Kepala Desa',
                            ], null, ['class' => 'form-control', 'placeholder' => '--Level Pengguna--']) }}
                            
                            {!! $errors->first('level', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group"> 
                        <div class="col-md-6 col-md-offset-4"> 
                            <button type="submit" class="btn btn-primary"> 
                                <i class="fa fa-btn fa-user"></i> Daftar 
                            </button> 
                        </div> 
                    </div> 
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
