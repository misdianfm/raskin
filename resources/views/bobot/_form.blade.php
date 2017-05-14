<div class="form-group{{ $errors->has('nama_bobot') ? ' has-error' : '' }}"> 
	{!! Form::label('nama_bobot', 'Nama Bobot', ['class'=>'col-md-2 control-label']) !!} 
	<div class="col-md-4"> 
		{!! Form::text('nama_bobot', null, ['class'=>'form-control']) !!} 
		{!! $errors->first('nama_bobot', '<p class="help-block">:message</p>') !!} 
	</div> 
</div>

<div class="form-group{{ $errors->has('bobot') ? ' has-error' : '' }}"> 
	{!! Form::label('bobot', 'Bobot', ['class'=>'col-md-2 control-label']) !!} 
	<div class="col-md-4"> 
		{!! Form::number('bobot', null, ['class'=>'form-control']) !!} 
		{!! $errors->first('bobot', '<p class="help-block">:message</p>') !!} 
	</div> 
</div>

<div class="form-group"> 
	<div class="col-md-4 col-md-offset-2"> 
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!} 
	</div> 
</div>