@extends('layouts.welc')

@section('content')
<div class="container-fluid" style="padding-top: 60px;">

    <div class="row" style="background-image: url('/images/6.jpg'); background-attachment: fixed;">
        <div class="col-md-4 col-md-offset-4" style="margin-top: 150px; margin-bottom: 350px; ">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center;">Reset Password</div>

                <div class="panel-body">
                    
                    {!! Form::open(['url'=>'/password/reset', 'class'=>'form-horizontal'])!!}
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"> 
                        {!! Form::label('email', 'Alamat Email', ['class'=>'col-md-5 control-label'])!!} 
                        <div class="col-md-6"> 
                            {!! Form::email('email', isset($email) ? $email : null, ['class'=>'form-control input-sm']) !!} 
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!} 
                        </div> 
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"> 
                        {!! Form::label('password', 'Password', ['class'=>'col-md-5 control-label']) !!} 
                        <div class="col-md-6"> 
                            {!! Form::password('password', ['class'=>'form-control input-sm']) !!} 
                            {!! $errors->first('password', '<p class="help-block">:message</p>') !!} 
                        </div> 
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}"> 
                        {!! Form::label('password_confirmation', 'Konfirmasi Password', ['class'=>'col-md-5 control-label']) !!} 
                        <div class="col-md-6"> 
                            {!! Form::password('password_confirmation', ['class'=>'form-control input-sm']) !!} 
                            {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!} 
                        </div> 
                    </div>

                    <div class="form-group"> 
                        <div class="col-md-6 col-md-offset-5"> 
                            <button type="submit" class="btn btn-primary btn-sm"> 
                                <i class="fa fa-btn fa-refresh"></i> Reset Password 
                            </button> 
                        </div> 
                    </div> 

                    {!! Form::close() !!} 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
