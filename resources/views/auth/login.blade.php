@extends('layouts.welc')

@section('content')
<div class="container-fluid" style="padding-top: 60px;">
    <div class="row" style="background-image: url('/images/6.jpg'); background-attachment: fixed;">
        <div class="col-md-6 col-md-offset-3">
            
                    
            <div class="panel panel-default" style="margin-top: 150px; margin-bottom: 300px; ">
                <div class="panel-heading">Masuk</div>
                <div class="panel-body">
                    @if (session('sukses'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ session('sukses') }}</strong> 
                        </div>
                    @endif
                    
                    {!! Form::open(['url'=>'login', 'class'=>'form-horizontal']) !!}

                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        {!! Form::label('username', 'Username', ['class'=>'col-md-4 control-label']) !!} 
                        <div class="col-md-6"> 
                            {!! Form::text('username', null, ['class'=>'form-control input-sm']) !!} {!! $errors->first('username', '<p class="help-block">:message</p>') !!} 
                        </div> 
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"> 
                        {!! Form::label('password', 'Password', ['class'=>'col-md-4 control-label']) !!} 
                        <div class="col-md-6"> 
                            {!! Form::password('password', ['class'=>'form-control input-sm']) !!} {!! $errors->first('password', '<p class="help-block">:message</p>') !!} 
                        </div> 
                    </div>

                    <div class="form-group"> 
                        <div class="col-md-6 col-md-offset-4"> 
                            <div class="checkbox"> 
                                <label> 
                                    {!! Form::checkbox('remember')!!} Ingat saya 
                                </label> 
                            </div> 
                        </div> 
                    </div>

                    <div class="form-group"> 
                        <div class="col-md-6 col-md-offset-4"> 
                            <button type="submit" class="btn btn-primary btn-sm"> 
                                <i class="fa fa-btn fa-sign-in"></i> Masuk 
                            </button>
                            <a class="btn btn-link" href="{{ url('/password/reset') }}">Lupa password</a> 
                        </div> 
                    </div> 

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
