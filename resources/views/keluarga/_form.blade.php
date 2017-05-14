<div class="form-group{{ $errors->has('no_kk') ? ' has-error' : '' }}"> 
	{!! Form::label('no_kk', 'Nomor KK', ['class'=>'col-md-3 control-label', 'style'=>'text-align: right;']) !!} 
	<div class="col-md-8"> 
		{!! Form::text('no_kk', null, ['class'=>'form-control']) !!} 
		<strong>{!! $errors->first('no_kk', '<p class="help-block" style="color: rgb(244, 100, 95);">:message</p>') !!}</strong>
	</div> 
</div>

<div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}"> 
	{!! Form::label('alamat', 'Alamat', ['class'=>'col-md-3 control-label', 'style'=>'text-align: right;']) !!} 
	<div class="col-md-8"> 
		{!! Form::text('alamat', null, ['class'=>'form-control']) !!}
		<strong>{!! $errors->first('alamat', '<p class="help-block" style="color: rgb(244, 100, 95);">:message</p>') !!}</strong> 
	</div> 
</div>

<div class="form-group{{ $errors->has('rt_id') ? ' has-error' : '' }}">
	{!! Form::label('rt_id', 'RT', ['class'=>'col-md-3 control-label', 'style'=>'text-align: right;']) !!}
	<div class="col-md-8">
		{!! Form::select('rt_id',$rt,null,['class' => 'form-control','placeholder' =>'-RT-']) !!}
		<strong>{!! $errors->first('rt_id', '<p class="help-block" style="color: rgb(244, 100, 95);">:message</p>') !!}</strong>
	</div>
</div>

<div class="form-group{{ $errors->has('rw_id') ? ' has-error' : '' }}">
		{!! Form::label('rw_id', 'RW', ['class'=>'col-md-3 control-label', 'style'=>'text-align: right;']) !!}
		<div class="col-md-8">
			{!! Form::select('rw_id',$rw,null,['class' => 'form-control','placeholder' =>'-RW-']) !!}
			<strong>{!! $errors->first('rw_id', '<p class="help-block" style="color: rgb(244, 100, 95);">:message</p>') !!}</strong>
		</div>
</div>

<div class="form-group">
	<div class="col-md-8 col-md-offset-3">
		<button type="submit" class="btn btn-primary" name="simpan" >Simpan</button>
	</div>
</div>
