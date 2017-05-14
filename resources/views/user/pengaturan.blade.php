@extends('layouts.dashboard')

@section('page_heading')
<ul class="breadcrumb">
    <li><a href="{{url('/home')}}">Beranda</a></li> 
    <li class="active">Pengaturan Pengguna</li>
</ul>
@endsection

@section('section')
<div class="col-md-12">
    @if (session('sukses'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Selamat!</strong> {{ session('sukses') }}
        </div>
    @elseif ($errors->all())
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Gagal!</strong>
        </div>
    @endif
</div>
<div class="col-md-10">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="panel-title">
                    Pengaturan
                </div>
            </div>
            <div class="panel-body">
                <br>
                <h4>
                    <center><b>Ubah Profil</b></center>
                </h4><br>
                {!! Form::model($ubah,array('action' => ['UserController@ubahuser'], 'role'=>'form', 'class'=>'form-horizontal')) !!}
                <input type="hidden" name="_method" value="PUT">

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> 
                        {!! Form::label('name', 'Nama', ['class'=>'col-md-4 control-label']) !!} 
                        <div class="col-md-6"> 
                            {!! Form::text('name', null, ['class'=>'form-control']) !!} 
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div> 
                    </div>

                    @if($ubah->level == "Superadmin")
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}"> 
                            {!! Form::label('username', 'Username', ['class'=>'col-md-4 control-label']) !!} 
                            <div class="col-md-6"> 
                                {!! Form::text('username', null, ['class'=>'form-control','readonly']) !!} 
                                {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                            </div> 
                        </div>
                    @else
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}"> 
                            {!! Form::label('username', 'Username', ['class'=>'col-md-4 control-label']) !!} 
                            <div class="col-md-6"> 
                                {!! Form::text('username', null, ['class'=>'form-control']) !!} 
                                {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                            </div> 
                        </div>
                    @endif

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"> 
                        {!! Form::label('email', 'Alamat Email', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6"> 
                            {!! Form::email('email', null, ['class'=>'form-control']) !!} 
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div> 
                    </div>

                    <div class="form-group"> 
                        <div class="col-md-6 col-md-offset-4"> 
                            <button type="submit" class="btn btn-primary"> 
                                Simpan 
                            </button> 
                        </div> 
                    </div> 

                {!! Form::close() !!}

                <br><br><hr>

                <h4>
                    <center>
                        <b>Ubah Kata Sandi</b>
                    </center>
                </h4><br>

                {!! Form::model($pengguna,array('action' => ['UserController@sandi'], 'class' => 'form-horizontal', 'role'=>'form')) !!}
                    <input type="hidden" name="_method" value="PUT">
                    
                    <div class="form-group">
                    <label class="col-sm-4 control-label" style="text-align: right;">Nama Pengguna</label>
                        <div class="col-sm-6">
                            {!! Form::text('name', null, ['class'=>'form-control', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                        <label for="current-password" class="col-sm-4 control-label" style="text-align: right;">Kata Sandi Lama</label>
                        <div class="col-sm-6">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                            <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Kata Sandi Lama">
                                {!! $errors->first('current-password', '<p class="help-block">:message</p>') !!}
                                @if (session('gagal'))
                                  {{ session('gagal') }}
                                @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-sm-4 control-label" style="text-align: right;">Kata Sandi Baru</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi Baru">
                            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password_confirmation" class="col-sm-4 control-label" style="text-align: right;">Konfirmasi Kata Sandi Baru</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Kata Sandi Baru">
                            {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-4">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection


